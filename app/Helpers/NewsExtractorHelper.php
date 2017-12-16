<?php

namespace App\Helpers;

use App\Helpers\Helper;

class NewsExtractorHelper extends BaseHelper {

    /**
     *  Dado o identificador de noticia, extrai a mesma do provedor de noticias
     */
    public static function getNewsJson($newsID) {
        
        $provider    = config('news.provider');
        $rgxLink     = config('news.regex.link');
        $rgxTitle    = config('news.regex.title');
        $rgxContent  = config('news.regex.content');
        $rgxContentP = config('news.regex.contentp');
        $rgxImg      = config('news.regex.img');
        $jsonFmt     = config('news.jsonfmt');
        $qtyNews     = config('news.qty');

        // Vai buscar, go get'em, a pagina principal
        $mainPage = file_get_contents($provider);

        // Extrai os links da pagina principal
        $links = self::getLinks($mainPage, $rgxLink);

        // Usa o ID aqui para escolher a noticia, 
        // um pouco arcaico, porem atende a ocasiao
        $target = $links[ $newsID % $qtyNews ];

        // Go get'em boy, busca a noticia escolhida
        $newsContent = file_get_contents($target);

        // Extrai informacoes da noticia
        $title   = self::getTitle  ($newsContent, $rgxTitle);
        $content = self::getContent($newsContent, $rgxContent, $rgxContentP);
        $img     = self::getImg    ($newsContent, $rgxImg);

        $json = str_replace('%NEWS_TITLE%',    $title,   $jsonFmt);
        $json = str_replace('%NEWS_CONTENT%',  $content, $json);
        $json = str_replace('%NEWS_IMG%',      $img,     $json);
        $json = str_replace('%NEWS_ORIGINAL%', $target,  $json);

        return $json;
    }

    private static function getLinks($content, $rgx) {
        preg_match_all($rgx, $content, $matches);
        return $matches[1];
    }

    private static function getTitle($content, $rgx) {
        preg_match($rgx, $content, $matches);
        return $matches[1];
    }

    private static function getContent($content, $rgxContent, $rgxContentP) {

        // Separa a noticia da pagina
        preg_match($rgxContent, $content, $matchNews);
        $newsOnly = $matchNews[1];

        // Agora extrai os paragrafos
        preg_match_all($rgxContentP, $content, $matchesP);

        // Remove paragrafos que nao sao da noticia
        // TODO: isso aqui ficou meio hardcoded, melhorar no futuro
        // Serao removidos o primeiro e os 5 ultimos paragrafos
        // Pois esses sao lixo, botoes de login etc
        $len = sizeof($matchesP[1]);

        foreach([0, --$len, --$len, --$len, --$len, --$len] as $del) {
            unset($matchesP[1][$del]);
        }
        
        // Remove qualquer provavel HTML existente, evitando problemas
        $striped = array_map("strip_tags", $matchesP[1]);

        return implode('<br />', $striped);
    }

    private static function getImg($content, $rgx) {
        preg_match($rgx, $content, $matches);
        return $matches[1];
    }
}

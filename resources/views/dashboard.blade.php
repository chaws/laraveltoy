@extends('layouts.app')

@section('page-style')
<style type="text/css">
    #numbers-summary div {
        height: 100px;
        background-color: #DDD;
        padding-top: 3px;
        margin-bottom: 10px;
    }

    #numbers-summary p {
        font-size: 300%;
        font-weight: bold;
        font-family: Arial;
    }

    #news h4{
        font-weight: bold;
    }

    #news img {
        width: 300px;
        height: 300px;
    }
</style>
@endsection

@section('page-js')
<script type="text/javascript">
    // Para fins de simplicidade, pegaremos apenas uma noticia para a pagina
    // aleatoriamente selectionada entre 0 e 9
    var newsid = parseInt(Math.random() * 1000) % 10;
    var newsurl = '{{ config('app.url') }}/news/' + newsid;
    $.getJSON(newsurl, function(news) {
        $('#news-title')   .html(news.title);
        $('#news-content') .html(news.content);
        $('#news-original').html(news.original);
        $('#news-img').attr('src', news.img);
    });
</script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="row">
                        <div id="numbers-summary" class="col-md-3 text-center">
                            <div id="sold">
                                <h5 class="text-uppercase">Imóveis Vendidos</h5>
                                <p>103</p>
                            </div>
                            <div id="rented">
                                <h5 class="text-uppercase">Imóveis Alugados</h5>
                                <p>1.203</p>
                            </div>
                            <div id="available">
                                <h5 class="text-uppercase">Imóveis Disponíveis</h5>
                                <p>32.193</p>
                            </div>
                        </div> <!-- end div#numbers-summary  -->
                        
                        <div id="news" class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 id="news-title">...</h4>
                                    <p id="news-content">...</p>
                                </div>
                                <div class="col-md-4">
                                    <img id="news-img" src="" alt="Imagem da noticia" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div id="numbers-summary">
                        <div id="sold">
                            <h4> Imóveis Vendidos </h4>
                            <p>103</p>
                        </div>
                        <div id="rented">
                            <h4> Imóveis Alugados </h4>
                            <p>1.203</p>
                        </div>
                        <div id="available">
                            <h4> Imóveis Disponíveis </h4>
                            <p>32.193</p>
                        </div>
                    </div> <!-- end div#numbers-summary  -->

                    <div id="rss-news">
                        <h2>Alguma Notícia Boa</h2>
                        <p>Texto da noticia boa</p>
                        <img src="" alt="Imagem da noticia boa" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

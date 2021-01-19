@extends('admin.layouts.main')
@section('container')
    <div class="slick-test">
        <div> <img src="{{ asset('assets/04.png') }}" alt="Segundo Slide"></div>
        <div> <img src="{{ asset('assets/05.png') }}" alt="Segundo Slide"></div>
        <div> <img src="{{ asset('assets/06.png') }}" alt="Segundo Slide"></div>
    </div>
    <div class="container">
        <div style="margin: 4rem 0" class="card-deck">
            <div class="card">
                <img class="card-img-top" src="{{ asset('assets/04.png') }}" alt="Imagem de capa do card">
                <div class="card-body">
                    <h5 class="card-title">Produtividade</h5>
                    <p class="card-text">Ganhe produtividade com seu sitema, gerencie produtos, usuários e adquira um desempenho superior a seus concorrentes.</p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="{{ asset('assets/05.png') }}" alt="Imagem de capa do card">
                <div class="card-body">
                    <h5 class="card-title">Gestão</h5>
                    <p class="card-text">Através do gerenciamento de dados é possível obter uma inteligência de negócio aprimorada.</p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="{{ asset('assets/06.png') }}" alt="Imagem de capa do card">
                <div class="card-body">
                    <h5 class="card-title">Inteligência</h5>
                    <p class="card-text">Software inteligente aprimorado com as últimas tecnologias estáveis do mercado.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('templates.layout')
@section('title')
    Bravo! ... un biglietto omaggio per te!
@endsection

@section('redirect')
    <meta http-equiv="refresh" content="{{ $time }};url=/" />
@endsection

@section('style')
    <style>
        @media print {
            .noPrint {
                display:none;
            }
        }
    </style>
@endsection

@section('content')
    <div class="noPrint">
        <div class="col-md-10">
            <h2>Un biglietto omaggio per te!!</h2>
        </div>
        <br>
    </div>
    <img src="{{ $nome_img }}">
    <br><br>
    <div class="noPrint">
        Entro {{ $time }} secondi premi il tasto "Stampa" per avere una copia del biglietto<br><br>
        <button onclick="myFunction()" class="btn btn-warning">Stampa</button>
    </div>
@endsection

@section('scripts')
    <script>
        function myFunction() {
            window.print();
        }
    </script>
@endsection

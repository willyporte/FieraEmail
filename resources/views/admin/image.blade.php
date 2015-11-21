@extends('templates.layout')
@section('title')
    Stampa image
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
        <br>
    </div>
    <img src="/images/{{ $nome_img }}">
    <br><br>
    <div class="noPrint" style="margin-left: 120px">
        <button onclick="myFunction()" class="btn btn-warning">Stampa</button>
        {!! link_to_route('admin.tickets',$title = 'Torna',[],['role' => 'button','class' => 'btn btn-primary']) !!}
    </div>
@endsection

@section('scripts')
    <script>
        function myFunction() {
            window.print();
        }
    </script>
@endsection
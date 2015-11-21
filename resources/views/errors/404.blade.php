@extends('templates.layout')
@section('title')
    Pagina sbagliata!
@endsection

@section('redirect')
    <meta http-equiv="refresh" content="5;url=/" />
@endsection

@section('content')
    {!! Html::image('images/homer-computer-doh.jpg') !!}
@endsection
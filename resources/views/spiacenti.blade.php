@extends('templates.layout')

@section('redirect')
    <meta http-equiv="refresh" content="{{ $time }};url=/" />
@endsection

@section('content')
    <br><br><br>
    <div class="alert alert-info col-md-10">
    <h3>{{ $name }}, grazie del tuo interessamento. <p>
            <small>Ti terremo informato sulle nostre iniziative.</small></p></h3>
    </div>
@endsection
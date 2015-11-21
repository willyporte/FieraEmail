@extends('admin.layout')

@section('title')
    Tick-Sys
@endsection

@section('content')

    <div class="col-md-4">
        <h1>Parametri del sistema</h1>


        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class')}}">{{ Session::get('message') }}</p>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::model($parametri,['route' => 'admin.parametri.update','method' => 'POST']) !!}

        <div class="form-group">
            {!! Form::label('omaggi_ogni','Omaggi ogni?') !!}
            {!! Form::text('omaggi_ogni',null,['class' => 'form-control', 'placeholder' => 'Ogni quante iscrizioni dai un biglietto omaggio?']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('gadget_ogni','Gadgets ogni?') !!}
            {!! Form::text('gadget_ogni',null,['class' => 'form-control', 'placeholder' => 'Ogni quante iscrizioni dai un gadget?']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('time','Tempo per Stampare (secondi)') !!}
            {!! Form::text('time',null,['class' => 'form-control', 'placeholder' => 'Quanto tempo per premere il tasto stampa?']) !!}
        </div>


        {!! Form::hidden('id',$parametri->id) !!}

        {!! Form::submit('Moficare Parametri',['class' => 'btn btn-info']) !!}

        {!! Form::close() !!}
    </div>
@endsection
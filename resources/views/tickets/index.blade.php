@extends('templates.layout')

@section('title')
    Tick-Sys
@endsection

@section('content')
    <div class="col-md-9">
    <div class="jumbotron alert-info">
        <h1>Lascia la tua E-mail (*)</h1>
    </div>
    <p> Ti terremo informato sulle nostre iniziative.</p>
    <p><b>Attenzione:</b> potrai ricevere un simpatico <b>omaggio</b> o un biglietto <b>omaggio!</b></p>
    <p><small>(*) il tuo indirizzo e-mail non sarà utilizzato per inviarti spam o altro materiale sgradito.</small></p>
    <br>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['route' => 'tickets.store','method' => 'POST']) !!}

        <div class="form-group">
            {!! Form::label('email','E-mail') !!}
            {!! Form::text('email',null,['class' => 'form-control', 'placeholder' => 'Il tuo e-mail']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('name','Denominazione') !!}
            {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Nome Cognome o Ragione Sociale']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('city','Città') !!}
            {!! Form::text('city',null,['class' => 'form-control', 'placeholder' => 'La tua città']) !!}
        </div>

        <small>

            <b>Informativa ai sensi del D.Lgs. n. 196/2003</b>
            <br>
            I dati personali vengono raccolti da Elettronica Low Cost s.r.l.s. in conformita'
            a quanto previsto dal Decreto Legislativo n. 196/2003 "Codice in materia di protezione
            dei dati personali". Il conferimento dei dati anagrafici e' facoltativo.
            I dati verranno trattati in modo manuale e/o elettronico, a fini statistici,
            di marketing e promozionali, per l'aggiornamento sulle diverse iniziative di Elettronica
            Low Cost s.r.l.s., attraverso l'invio di materiale informativo.
            I dati inoltre potranno essere comunicati a ditte o imprese che effettuano, per conto
            di Elettronica Low Cost s.r.l.s., il trattamento dei dati presso di loro o che provvedono alla postalizzazione del materiale promozionale. In base a quanto previsto dall'art. 7 del D.Lgs. n. 196/03 sopra menzionato i dati potranno essere consultati, modificati, integrati o cancellati, anche gratuitamente, secondo i termini e le modalità previste dal D.Lgs. n. 196/03, scrivendo al Titolare dei dati: Elettronica Low Cost s.r.l.s., Via Oberdan, 23 - 60024 Filottrano (AN).


        </small>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="privacy"><b>Preso atto dell'informativa di chi sopra, presto il consenso al trattamento dei miei dati per la finalità indicate.</b>
            </label>
        </div>
        <br>
        {!! Form::submit('Buona Fortuna!',['class' => 'btn btn-info']) !!}

    {!! Form::close() !!}
    </div>
@endsection
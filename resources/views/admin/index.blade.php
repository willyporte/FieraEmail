@extends('admin.layout')

@section('titulo')
    Con voi ... i nostri tickets!
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Tickets
                        <a href="{{ route('admin.excel.index')}}" class="btn btn-xs btn-warning pull-right" role="button" title="Esporta emails a .csv">Export</a>
                        <br>
                    </div>
                        {!! Form::model(Request::all(),[
                            'route' => 'admin.tickets',
                            'method' => 'GET',
                            'class' => 'navbar-form navbar-left pull-right',
                            'role' => 'search']) !!}
                        <div class="form-group">
                            {!! Form::text('email',null,[
                            'class' => 'form-control',
                            'placeholder' => 'email']) !!}

                            {!! Form::select('won',
                                ['all' => 'Tutti','omaggio' => 'Omaggio','gadget' => 'gadget'],
                                null,
                                ['class' => 'form-control','placeholder' => 'Scelta Premio']) !!}

                            <button type="submit" class="btn btn-default">Cerca</button>
                        </div>
                        {!! Form::close() !!}
                    <br>
                    <br>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed table-hover">
                                <thead>
                                <tr class="info">
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Città</th>
                                    <th>Vinto?</th>
                                    <th>Immagine</th>
                                    <th>Quando</th>
                                </tr>
                                </thead>
                                @foreach($tickets as $ticket)
                                    <tbody>
                                    <tr>
                                        <td>{{ $ticket->name }}</td>
                                        <td>{{ $ticket->email }}</td>
                                        <td>{{ $ticket->city }}</td>
                                        <td>{{ $ticket->won }}</td>
                                        <td>
                                            @if( $ticket->image <> '' )
                                                {!! link_to_route('admin.image',$title='Immagine',str_replace('images/','',$ticket->image)) !!}
                                            @endif
                                        </td>
                                        <td>{{ $ticket->created_at->diffForHumans() }}</td>
                                    </tr>
                                    </tbody>
                                @endforeach

                            </table>
                            Total records: {!! $tickets->total() !!} <br>
                            {!! $tickets->appends(Request::only(['name','won']))->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

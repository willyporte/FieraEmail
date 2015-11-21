<table>
    <thead>
    <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Città</th>
        <th>Vinto?</th>
    </tr>
    </thead>
    @foreach($tickets as $ticket)
        <tbody>
        <tr>
            <td>{{$ticket->name }}</td>
            <td>{{$ticket->email }}</td>
            <td>{{$ticket->city }}</td>
            <td>{{$ticket->won }}</td>
        </tr>
        </tbody>
    @endforeach
</table>


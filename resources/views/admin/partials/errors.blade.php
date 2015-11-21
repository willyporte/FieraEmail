@if(count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong>
        Ci sono dei problemi con i tuoi inserimenti:
        <ul>
            @foreach($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif

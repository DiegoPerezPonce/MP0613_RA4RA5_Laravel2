<h1>Actors List</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Birthdate</th>
        <th>Country</th>
    </tr>

    @foreach($actors as $actor)
    <tr>
        <td>{{ $actor->id }}</td>
        <td>{{ $actor->name }}</td>
        <td>{{ $actor->surname }}</td>
        <td>{{ $actor->birthdate }}</td>
        <td>{{ $actor->country }}</td>
    </tr>
    @endforeach
</table>
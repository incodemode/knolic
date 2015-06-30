@section('content')

<h2>Dashboard</h2>
<table>
	<tr>
		<th>id</th>
		<th>step</th>
		<th>page</th>
	</tr>
	@foreach($users as $user)
	<tr>
		<td>{{$user->id}}</td>
		<td>{{$user->current_step}}</td>
		<td>{{$user->current_page}}</td>
	</tr>
	@endforeach
</table>

@stop
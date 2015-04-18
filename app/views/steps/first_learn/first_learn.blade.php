@section('content')
	<p>
		&nbsp;
		@if($page!=0)
			<a href="{{route('learn_1', ['page' => $page-1])}}" title="Anterior" class="buttonLeft">« Anterior</a>
		@endif
		@if($page < 7)
			<a href="{{route('learn_1', ['page' => $page+1])}}" title="Siguiente" class="buttonRight">Siguiente Página »</a>
		@else
			@if($currentUser->a22)
				<a href="{{route('a221', ['page' => 0])}}" title="Siguiente" class="buttonRight">Siguiente Página »</a>
			@else
				<a href="{{route('learn_2', ['page' => 0])}}" title="Siguiente" class="buttonRight">Siguiente Página »</a>
			@endif
		@endif
	</p>
	<br class="clear" />
	@include('steps.first_learn.'.$page)
	<br class="clear" />
	<p>
		&nbsp;
		@if($page!=0)
			<a href="{{route('learn_1', ['page' => $page-1])}}" title="Anterior" class="buttonLeft">« Anterior</a>
		@endif
		@if(View::exists('steps.first_learn.'.($page+1)))
			<a href="{{route('learn_1', ['page' => $page+1])}}" title="Siguiente" class="buttonRight">Siguiente Página »</a>
		@else
			@if($currentUser->a22)
				<a href="{{route('a221', ['page' => 0])}}" title="Siguiente" class="buttonRight">Siguiente Página »</a>
			@else
				<a href="{{route('learn_2', ['page' => 0])}}" title="Siguiente" class="buttonRight">Siguiente Página »</a>
			@endif
		@endif
	</p>
@stop
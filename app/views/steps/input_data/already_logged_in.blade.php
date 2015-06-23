@section('content')

<h2>Ya tienes una sessión abierta</h2>

<p>
Si deseas iniciar sesión con otro usuario <a href="{{route('logout')}}" title="Cerrar sesión"> cierra tu sesión actual </a>.
</p>
<p>
Si deseas continuar en donde te quedaste <a href="{{$currentUrl}}" title="Seguir estudiando"> haz click aqui </a>.
</p>

@stop
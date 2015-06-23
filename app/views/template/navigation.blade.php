<p>
	@if(isset($previousUrl) && $previousUrl != '')
	    <input type="button" value="« Página Anterior" class="yellowButton" data-previousButton data-previousUrl="{{$previousUrl}}">
	@endif
	@if(isset($nextUrl) && $nextUrl != '')
	    <input type="button" value="Siguiente Página »" class="nextButton" data-nextButton data-nextUrl="{{$nextUrl}}">
	@endif
</p>
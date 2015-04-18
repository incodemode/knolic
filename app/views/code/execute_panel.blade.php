

	<p data-executePanel>
        @if(isset($executeUrl) && $executeUrl != '')
            <input type="button" value="Ejecutar" data-executeButton data-executeUrl="{{$executeUrl}}">
        @else
            <input type="button" value="Ejecutar" data-executeButton data-executeUrl="{{route('generic_code.ajax_execute')}}">
        @endif
		
        <input type="button" value="Deshacer todos los cambios" tabindex="5" data-undoButton>
		
        @if(isset($nextUrl) && $nextUrl != '')
            <a href="{{$nextUrl}}" title="Siguiente" style="float:right; display:none; margin-left:20px;" data-nextButton> Siguiente Página »</a>
        @endif
        
        <span class="buttonLeft" style="display:none;" data-loading><img src="/images/loading.gif" alt="loading" style="width:18px; height:18px;"> &nbsp;&nbsp;&nbsp;</span>
        &nbsp;
	</p>
	<div class="ui-widget" style="display:none;" data-successWidget>
        <div style="margin-top: 20px; padding: 0 .7em;" class="ui-state-highlight ui-corner-all">
            <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-info"></span>
            <strong data-successTitle>Salida estandar</strong><br> <span data-successContent>El programa ha corrido exitosamente! Puedes pasar a la siguiente página.</span></p>
        </div>
    </div>
    <div class="ui-widget" style="display:none;" data-errorWidget>
        <div style="padding: 0 .7em;" class="ui-state-error ui-corner-all">
            <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span>
            <strong data-errorTitle>Alert:</strong> <br> <span data-errorContent>Sample ui-state-error style.</span></p>
        </div>
    </div>

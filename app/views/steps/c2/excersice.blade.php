
@section('content')

<style type="text/css" media="screen">
body {
overflow: hidden;
}
#editor {
margin: 20px;
width:560px;
height:200px;
}
</style>


	<h2>PHP 101</h2>
	<div>
		<form action="#" method="post" id="C2Exercise">

			<p> Antes de empezar por favor resuelva este sencillo problema de php:</p>
			<p> Si tiene las variables $a y $b, utilizando solamente una variable temporal $c intercambie los valores de $a y $b.</p>
			<p> Por ejemplo si al inicio $a = 1 y $b = 2</p>
			<p> Luego de ejecutar su código los valores quedarán como: $a = 2 y $b = 1</p>
			
				<div style="width:600px; height:200px;">
					<pre id="editor" name="editor">
//definiendo $a y $b.
$a = $aTest = rand(1,10);
$b = $bTest = rand(11,20);
//[inicio] su código va despues de esta linea



//[fin] su código termina en esta linea
if($a == $bTest && $b == $aTest){
    echo('OK');
}else{
    echo('FAIL');
}</pre>
				</div>
			
            
			<p>
				<a href="#" title="Ejecutar" style="float:right;margin-right:20px;" id="execute">Ejecutar</a>
                <a href="#" title="Siguiente" style="float:right; display:none; margin-right:20px;" id="next"> Siguiente »</a>
                <span style="float:right;margin-right:10px;display:none;" id="loading"><img src="/images/loading.gif" alt="loading" style="width:18px; height:18px;"> &nbsp;&nbsp;&nbsp;</span>
			</p>
            <div class="ui-widget" id="successWidget" style="display:none;">
                <div style="margin-top: 20px; padding: 0 .7em;" class="ui-state-highlight ui-corner-all">
                    <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-info"></span>
                    <strong>Éxito!</strong> El programa ha corrido exitosamente! Puedes pasar a la siguiente página.</p>
                </div>
            </div>
            <div class="ui-widget" id="errorWidget" style="display:none;">
                <div style="padding: 0 .7em;" class="ui-state-error ui-corner-all">
                    <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span>
                    <strong id="errorTitle">Alert:</strong> <span id="errorContent">Sample ui-state-error style.</span></p>
                </div>
            </div>
		</form>
	</div>









<script>
var editor = ace.edit("editor");
editor.setTheme("ace/theme/twilight");
editor.getSession().setMode("ace/mode/php");
var noIntersect = function(lineStart, charStart, lineEnd, charEnd){
    var session  = editor.getSession()
    , Range    = ace.require("ace/range").Range
    , range    = new Range(lineStart, charStart, lineEnd, charEnd)
    , markerId = session.addMarker(range, "readonly-highlight");

    session.setMode("ace/mode/javascript");
    editor.keyBinding.addKeyboardHandler({
        handleKeyboard : function(data, hash, keyString, keyCode, event) {
            if (hash === -1 || (keyCode <= 40 && keyCode >= 37)) return false;

            if (!intersects(range)) {
                return {command:"null", passEvent:false};
            }
        }
    });

    before(editor, 'onPaste', preventReadonly);
    before(editor, 'onCut',   preventReadonly);

    range.start  = session.doc.createAnchor(range.start);
    range.end    = session.doc.createAnchor(range.end);
    range.end.$insertRight = true;

}


function before(obj, method, wrapper) {
    var orig = obj[method];
    obj[method] = function() {
        var args = Array.prototype.slice.call(arguments);
        return wrapper.apply(this, function(){
            return orig.apply(obj, origArgs);
        }, args);
    }

    return obj[method];
}

function intersects(range) {
    return editor.getSelectionRange().intersects(range);
}

function preventReadonly(next) {
    if (intersects(range)) return;
    next();
}

editor.setFontSize(14);
noIntersect(3, 46, 7, 0);
$(document).on('click', '#execute', function(evt){
    evt.preventDefault();
    var submitParameters = {
        editor: editor.getSession().getValue()
    };

    $('#errorWidget').hide();
    $('#successWidget').hide();
    $('#loading').show();
    $.post(document.location.href, submitParameters, function(data){
        globalData = data;

        if(data.error == '1'){
            if(data.stderr != null && data.stderr != ''){
                $('#errorTitle').text(data.errorDescription);
                $('#errorContent').html(data.stderr);
            }else{
                $('#errorTitle').text('Alerta!');
                $('#errorContent').html(data.errorDescription);
            }
            $('#errorWidget').show();
        }else{
            $('#successWidget').show();
            $('#execute').hide();
            $('#next').show();
        }
        $('#loading').hide();
    }).fail(function() {
        $('#errorTitle').text('Error de conexión!');
        $('#errorContent').html('No se pudo conectar con el servidor knolic.');
        $('#errorWidget').show();
        $('#loading').hide();
    });

});
</script>
@stop
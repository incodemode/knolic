
$(document).ready(function(){
    var $c1 =$('#c1')
    if($c1.length!=1){
        return;
    }
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
});
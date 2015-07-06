codeEditorStack = {};
$(document).ready(function(){
    var $codes = $('[data-code]');
    $codes.each(function(index){
    	var $code = $(this);

    	$code.attr('id', 'code_'+index);
    	initEditor($code);
    	
    });
    function initEditor($code){
    	var initialCode = $code.text();
    	var codeLines =  initialCode.split("\n", -1);
    	var height = codeLines.length * 27.5;
    	$code.css('height', height + 'px');

    	var $codeReplacement = $code.clone();

    	var codeId = $code.attr('id');

    	var editor = ace.edit(codeId);
        
        editor.renderer.setShowGutter(true); 
        editor.container.style.lineHeight = "1.7";
        codeEditorStack[codeId] = editor;
/*        ace.require("ace/module");
    	editor.setTheme("ace/crimson_editor");*/
    	editor.getSession().setMode("ace/mode/php");
    	editor.setOptions({
          fontSize: "12pt"
        });
    	var $executePanel = $code.next('[data-executePanel]').first();
    	var $undoButton = $executePanel.find('[data-undoButton]').first();
    	var $executeButton = $executePanel.find('[data-executeButton]');
    	var $loading = $executePanel.find('[data-loading]');
    	
    	var $successWidget = $code.nextAll('[data-successWidget]').first();
    	var $successContent = $successWidget.find('[data-successContent]');
    	var $errorWidget = $code.nextAll('[data-errorWidget]').first();
    	var $errorTitle = $errorWidget.find('[data-errorTitle]');
    	var $errorContent = $errorWidget.find('[data-errorContent]');
    	$undoButton.click(function(evt){
            evt.preventDefault();
            ace.edit($code.attr('id')).destroy();
            $code.replaceWith($codeReplacement);
            
            $undoButton.off('click');
            $executeButton.off('click');
            initEditor($codeReplacement);
            $codeReplacement.trigger('undone');
            


    	});

    	$executeButton.click(function(evt){
            evt.preventDefault();
            
            var submitParameters = {
                code: editor.getSession().getValue()
            };
            
            $errorWidget.hide();
            $successWidget.hide();
            $loading.show();
            $executeButton.hide();
            $undoButton.hide();
            var executeUrl = $executeButton.attr('data-executeUrl');

            $.post(executeUrl, submitParameters, function(data){
                if(data.session_error){
                    document.location.href = data.login_url;
                }
                globalData = data;
                if(data.error){
                    $errorTitle.html('Oops!');
                    $errorContent.html(data.errorDescription);
                    $errorWidget.show();
                }else if(data.stderr != ''){
                    $errorTitle.html('Salida de error estandar');
                    $errorContent.html(data.stderr);
                    $errorWidget.show();

                }
                if(data.output != ''){
                    $successWidget.show();
                    $successContent.html('<pre>'+data.output+'</pre>');
                    
                }
                $loading.hide();
                $executeButton.show();
                $undoButton.show();
                $code.trigger('ajaxFinished', data);
            }).fail(function() {
                $errorTitle.text('Error de conexión!');
                $errorContent.html('No se pudo conectar con el servidor knolic.');
                $errorWidget.show();
                $loading.hide();
                $executeButton.show();
                $undoButton.show();
                $code.trigger('ajaxFinished');
            });
        });
        $code.show();
	    $code.trigger('finishedInit', editor);
    }
    
});


    
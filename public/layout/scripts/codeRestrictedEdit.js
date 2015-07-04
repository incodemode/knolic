$(function(){
	$(document).on('finishedInit', '[data-code][data-restrictedEdit]', function(event, editor){
		
		var $code = $(this);
		editor.setOption("dragEnabled", false)
	    var allowEdition = function(lineStart, charStart, lineEnd, charEnd, lineEndEnd, charEndEnd){
	        var session  = editor.getSession()
	        , Range    = ace.require("ace/range").Range
	        , range    = new Range(lineStart, charStart, lineEnd, charEnd)
	        , markerId = session.addMarker(range, "readonly-highlight");

	        /*editor.session.addFold("", new Range(0,0,lineStart,charStart));
	        editor.session.addFold("", new Range(lineEnd,0,lineEndEnd,charEndEnd));*/

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
	        	
	        	
	        	editor.selection.toSingleRange();
	        	var range1 = editor.getSelectionRange();
	        	var range2 = range;
	        	//var intersects = editor.getSelectionRange().intersects(range);

	        	var text = editor.getSession().getValue();
	        	var textLength = text.length;
	        	
	        	pseudoRange1 = {
	        		'start' : range1.start.row + (range1.start.column/textLength),
	        		'end' : range1.end.row + (range1.end.column/textLength)
	        	};
	        	pseudoRange2 = {
	        		'start' : range2.start.row + (range2.start.column/textLength),
	        		'end' : range2.end.row + (range2.end.column/textLength)
	        	}
	        	
	        	var intersects = false;
	        	
	        	if(pseudoRange1.start >= pseudoRange2.start && 
	        		pseudoRange1.start <= pseudoRange2.end &&
	        		pseudoRange1.end >= pseudoRange2.start && 
	        		pseudoRange1.end <= pseudoRange2.end){
	        		intersects = true;
	        	}/*if(pseudoRange2.start >= pseudoRange1.start && pseudoRange2.start <= pseudoRange1.end){
	        		intersects = true;
	        	}else if(pseudoRange2.end >= pseudoRange1.start && pseudoRange2.end <= pseudoRange1.end){
	        		intersects = true;
	        	} //1.start between 2*/
	        	return intersects;
	        }

	        function preventReadonly(next) {
	            if (!intersects(range)) return;
	            next();
	        }

	    }


	    
	    var code = editor.getSession().getValue();
	    var codeLines =  code.split("\n", -1);
	    var lineStart, charStart, lineEnd, charEnd;

	    for(var i = 0; i< codeLines.length; i++){
	        if(codeLines[i].lastIndexOf('//[inicio]', 0) === 0){
	            lineStart = i+1;
	            charStart = 0;
	        }

	        if(codeLines[i].lastIndexOf('//[fin]', 0) === 0){
	            lineEnd = i;
	            charEnd = 0;
	        }
	    }
	    var lineEndEnd = codeLines.length;
	    var charEndEnd = codeLines[codeLines.length-1].length;

	    
	    allowEdition(lineStart, charStart, lineEnd, charEnd, lineEndEnd, charEndEnd);

	});
});

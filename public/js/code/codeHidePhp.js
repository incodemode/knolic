$(document).on('finishedInit', '[data-code][data-hidePhp]', function(event, editor){

		var session  = editor.getSession()
	        , Range    = ace.require("ace/range").Range
	        , range    = new Range(0,0,0,5);

        editor.session.addFold("", range);


        var $code = $(this);
		editor.setOption("dragEnabled", false)
	    
	        


	        editor.keyBinding.addKeyboardHandler({
	            handleKeyboard : function(data, hash, keyString, keyCode, event) {
	                if (hash === -1 || (keyCode <= 40 && keyCode >= 37)) return false;

	                if (intersects(range)) {
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

});
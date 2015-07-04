$(document).on('finishedInit', '[data-code][data-hidePhp]', function(event, editor){

		var Range    = ace.require("ace/range").Range
        editor.session.addFold("", new Range(0,0,0,5))

});
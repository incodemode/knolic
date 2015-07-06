$(function(){
	

	$(document).on('ajaxFinished', '[data-code][data-exercise]', function(event, data){
		
		var $code = $(this);
		if(data && data.passed){
			var $passedFront = $code.parent().find('.passedFront');
			var $executePanel = $code.nextAll('[data-executePanel]');
			var $executeButton = $executePanel.find('[data-executeButton]');
			var $nextButton = $('[data-nextButton]');
			$executeButton.hide();
			$nextButton.show();
			$passedFront.show();
			$passedFront.width($code.width());
			$passedFront.height($code.height());
		}
	});

	$(document).on('undone', '[data-code][data-exercise]', function(event, data){
		
		var $code = $(this);
		
		var $executePanel = $code.nextAll('[data-executePanel]');
		
		var $executeButton = $executePanel.find('[data-executeButton]');
		var $successWidget = $code.nextAll('[data-successWidget]').first();
    	var $errorWidget = $code.nextAll('[data-errorWidget]').first();
		var $nextButton = $('[data-nextButton]');

		$executeButton.show();
		$nextButton.hide();
		$successWidget.hide();
		$errorWidget.hide();
		
	});
});

$(document).on('finishedInit', '[data-code][data-exercise]', function(event, editor){


	var $code = $(this);
	
	
	var passed = $code.attr('data-passed');
	var $nextButton = $('[data-nextButton]');
	var $passedFront = $code.parent().find('.passedFront');
	if(passed == '1'){
		
		
		var $executePanel = $code.nextAll('[data-executePanel]');
		var $executeButton = $executePanel.find('[data-executeButton]');
		var $undoButton = $('[data-undoButton]');
		$executeButton.hide();
		$nextButton.show();
		$passedFront.show();
		$passedFront.width($code.width());
		$passedFront.height($code.height());
		$undoButton.click(function(){
			$passedFront.hide();
		});

	}else{
		$passedFront.hide();
		$nextButton.hide();
	}
		
	

});
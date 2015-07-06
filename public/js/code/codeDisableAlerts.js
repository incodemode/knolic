$(document).on('finishedInit', '[data-code][data-disableAlerts]', function(event, editor){
		
		editor.session.setUseWorker(false);
		editor.renderer.setShowGutter(false); 
});
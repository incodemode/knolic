$(document).ready(function(){
	var base64DecodePhoneEvt = function(evt){
		evt.preventDefault();
		var $phoneHolder = $(this);
		var phoneEncoded = $phoneHolder.attr('data-phone');
		var phone = $.base64.atob(phoneEncoded);
		$phoneHolder.replaceWith(phone);
	};
	var base64DecodeEmailEvt = function(evt){
		evt.preventDefault();
		var $emailHolder = $(this);
		var encodedEmail = $emailHolder.attr('data-email');
		var email = $.base64.atob(encodedEmail);
		$emailHolder.attr('href', 'mailto:' + email + '?Subject=knolic');
		$emailHolder.text(email);
		$emailHolder.attr('title', email);
	};
	$(document).on('click', 'a[data-phone]', base64DecodePhoneEvt);
	$(document).on('click', 'a[data-email]', base64DecodeEmailEvt);

});
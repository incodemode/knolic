<?php

class BaseController extends Controller {

	protected $layout = 'template.template';

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{


		$email = base64_encode('lmdbluis@gmail.com');
		$phone = base64_encode('34859662');
		$currentUser = Users::getCurrentUser();

		
		
		$layoutParameters = compact('email', 'phone', 'currentUser');
		
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout, $layoutParameters);
		}
		$this->layout->with(['name'=>'Luis']);

	}

}

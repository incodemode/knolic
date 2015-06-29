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

								//	= [ piel    ,  piel 2  , rosado    , azul    , morado   , verde       ]
		
		
		$a1StrongBackgroundSet 		= ['#fff2cc', '#fce5cd', '#f4cccc', '#d9d2e9', '#cfe2f3', '#d9ead3'];
		$a1LightBackgroundSet 		= ['#FFF9E6', '#FFF4E8', '#FFECEC', '#F3F1F9', '#F3F9FE', '#F1F6EF'];
		$a1SuperLightBackgroundSet 	= ['#FFFDF8', '#FFFCF9', '#FFFBFB', '#FFFFFF', '#FFFFFF', '#FEFEFE'];		

		if($currentUser && $currentUser->a1){
			$backgroundSetIndex = rand(0,5);
			$a1StrongBackground = $a1StrongBackgroundSet[$backgroundSetIndex];
			$a1LightBackground = $a1LightBackgroundSet[$backgroundSetIndex];
			$a1SuperLightBackground = $a1SuperLightBackgroundSet[$backgroundSetIndex];
		}

		View::share(compact('email', 'phone', 'currentUser', 'a1StrongBackground', 'a1LightBackground', 'a1SuperLightBackground'));

		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
		

	}


}

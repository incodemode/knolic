<?php


use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class UpdateExercisesCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'updateExercises';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'update all exercises to the new version without //[inicio] y //[fin].';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$exercises = Exercises::all();
			foreach($exercises as $exercise){

				$code = $exercise->code;
				if(!empty($code)){
					$this->info($code);
					$codeArr = explode(PHP_EOL, $code);
					$this->info(print_r($codeArr,true));
					$finalCode = '<?php' . PHP_EOL;
					$inicioPassed = false;
					foreach($codeArr as $codeLine){
						if(strpos($codeLine, '//[fin]')!==false){
							break;
						}
						if($inicioPassed){
							$finalCode .= $codeLine.PHP_EOL;
						}
						if(strpos($codeLine, '//[inicio]')!==false){
							$inicioPassed = true;
						}

						

					}
					$exercise->code = $finalCode;
					$exercise->save();
				}

			}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			//array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}

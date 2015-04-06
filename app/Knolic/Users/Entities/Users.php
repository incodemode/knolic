<?php namespace Knolic\Users\Entities;

use Eloquent;

class Users extends Eloquent{

	$table = 'users';
	$fillable = ['email', 'name', 'birthDate', 'currentStep', 'currentPage'];
	

}
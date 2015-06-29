<?php


class Times extends Eloquent{
	
	protected $table = 'times';
	protected $fillable = ['start', 'end', 'user_id', 'step', 'page', 'page', 'time'];

}
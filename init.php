<?php defined('SYSPATH') or die('No direct script access.');
// Роутеры для работы с валютами
Route::set('currency', 'getcurrency(/<date>)', array('date'=>'([0-9\/]+)'))
	->defaults(array(
		'controller' => 'currency',
		'action'     => 'index',
		'date'		 => NULL,
	)
);
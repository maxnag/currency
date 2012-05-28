<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Модуль для получения валюты
 * 
 * @author Max Nagaychenko
 *
 */
class Controller_Currency extends Controller {

	/**
	 * Получение данных по указанному дню
	 *
	 * @return void
	 */
	public function action_index()
	{
		$date = $this->request->param('date', date('d/m/Y'));

		$currency_model = new Model_Curr;
		$currency_data = $currency_model->get_currency_from_server($date);

		print_r($currency_data);
	}
}// End Currency Controller


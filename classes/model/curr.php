<?php defined('SYSPATH') or die('No direct script access.');

class Model_Curr extends Model {

	/**
	 * Получения данных с сервера ЦБРФ (http://www.cbr.ru/)
	 *
	 * @param string $date текущая дата
	 * @return string
	 */
	public function get_currency_from_server($date)
	{
		$allow_currency = array('EUR', 'USD');
		$link = "http://www.cbr.ru/scripts/XML_daily.asp?date_req=$date";
		$text = @file_get_contents($link);

		$xml = new SimpleXMLElement($text);

		foreach ($xml->Valute as $curr)
		{
			if(in_array($curr->CharCode, $allow_currency))
			{
				$currency[] = $date . ' ' . $curr->CharCode . ' ' . UTF8::str_ireplace(',', '.', (string)$curr->Value);
			}
		}

		return $currency;
	}
} // End Currency Model

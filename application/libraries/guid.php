<?php
setlocale(LC_ALL, 'en_US.UTF8');
class Guid
{
	public function generate($str)
	{
		$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
		$clean = preg_replace("/[^a-zA-Z0-9\/_| -]/", '', $clean);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[\/_| -]+/", '-', $clean);
		return $clean;
	}
}
?>
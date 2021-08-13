<?php
	
	echo '<pre>', print_r($_POST), '</pre>';
//	echo '<pre>', print_r(123123), '</pre>';
//	echo '<hr>';
//	$data = json_decode($_POST["mail-form"]);
//	$name = $data->name;
//	$phone = $data->phone;
//
//	echo '<pre>', print_r($data), '</pre>';
//	echo '<hr>';
//	echo '<pre>', print_r($name), '</pre>';
//	echo '<pre>', print_r($phone), '</pre>';
//
//
//	$message = "<table><tr><td>Имя</td><td>".$name."</td></tr><tr><td>Телефон</td><td>".$phone."</td></tr></table>";
//
//	mail("koles1ko@yandex.ru", 'header', $message);
	
	
	/*
	$c = true;
	if ( $method === 'POST' ) {

//получаем данные из скрытых полей
		$project_name = trim($_POST["project_name"]); //тут можно написать имя сайта или страницы с которой была отправка
		$admin_email  = trim($_POST["admin_email"]); //можно тут указать e-mail на который будут приходить сообщения
		$form_subject = trim($_POST["form_subject"]); // тут можно написать из какой формы была сделана отправка данных
//получаем данные из скрытых полей

//перебираем данные которые ввел пользователь
		foreach ( $_POST as $key => $value ) {
			if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
				$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
			}
		}
	}
	
	$message = "<table style='width: 100%;'>$message</table>";
	
	function adopt($text) {
		return '=?UTF-8?B?'.Base64_encode($text).'?=';
	}
	
	$headers = "MIME-Version: 1.0" . PHP_EOL .
		"Content-Type: text/html; charset=utf-8" . PHP_EOL .
		'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .
		'Reply-To: '.$admin_email.'' . PHP_EOL;
	
	mail($admin_email, adopt($form_subject), $message, $headers ); // функция отправки почты
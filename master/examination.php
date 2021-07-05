<?php

class Examination
{
	var $host;
	var $username;
	var $password;
	var $database;
	var $connect;
	var $home_page;
	var $query;
	var $data;
	var $statement;
	var $filedata;

	function __construct()
	{
		$this->host = 'localhost';
		$this->username = 'root';
		$this->password = '&#@immortal4581';
		$this->database = 'online_examination';
		$this->home_page = 'http://localhost/tutorial/online_examination/';

		$this->connect = new PDO("mysql:host=$this->host; dbname=$this->database", "$this->username", "$this->password");

		session_start();
	}

	function execute_query()
	{
		$this->statement = $this->connect->prepare($this->query);
		$this->statement->execute($this->data);
	}

	function total_row()
	{
		$this->execute_query();
		return $this->statement->rowCount();
	}

	function send_email($receiver_email, $subject, $body)
	{
		$mail = new PHPMailer;

		$mail->IsSMTP();

		$mail->Host = 'smtp.gmail.com';

		$mail->Port = '587';

		$mail->SMTPAuth = true;

		$mail->Username = '';

		$mail->Password = '';

		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

		$mail->From = 'sender email';

		$mail->FromName = 'KC Samm';

        $mail->AddAddress($receiver_email, '');
        
        $mail->addAddress('another receiver email');

		$mail->IsHTML(true);

		$mail->Subject = $subject;

		$mail->Body = $body;

		$mail->Send();		
	}
    
}

?>
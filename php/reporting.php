<?php
	session_start();
	function reporting($message)
	{
		header('Content-type: application/json');
		unset($response_message['status']);
		$response_message['status'] = $message;
		$result = json_encode($response_message);
		echo($result);
		exit();
	}
?>
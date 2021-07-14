<?php 

	$data = $_POST;
	if ( isset($data['submit']) )
	{
		$errors = array();
		if ( trim($data['login']) == 'login' and $data['password'] == 'pass') 
		{
			header("Location: for-admin.php");
		}else
		{
			header("Location: opps.html");
		}
	}

?>
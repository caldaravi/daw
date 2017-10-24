<?php

/* DECLARE VARIABLES */
$username1 = 'carlos'; $username2 = 'marcos'; $username3 = 'admin';
$password = '1234';
$random1 = 'secret_key1';
$random2 = 'secret_key2';
$hash = md5($random1 . $password . $random2);
$self = $_SERVER['REQUEST_URI'];

/* USER IS LOGGED IN */
if (isset($_SESSION['login']) && $_SESSION['login'] == $hash)
{
	logged_in_msg();
}
/* FORM HAS BEEN SUBMITTED */
else if (isset($_POST['submit']))
{
	if (($_POST['username'] == $username1 || $_POST['username'] == $username2 || $_POST['username'] == $username1) && 
    $_POST['password'] == $password){
		//IF USERNAME AND PASSWORD ARE CORRECT SET THE LOGIN SESSION
		$_SESSION["login"] = $hash;
		header("Location: $_SERVER[PHP_SELF]");
	}
	else
	{
		// DISPLAY FORM WITH ERROR
		display_login_form();
		display_error_msg();
	}
}
/* SHOW THE LOGIN FORM */
else
{
	display_login_form();
}
/* TEMPLATES */
function display_login_form()
{
	echo '<form action="' . isset($self) . '" method="post">' .
			'<label for="username">username</label>' .
			'<input type="text" name="username" id="username">' .
			'<label for="password">password</label>' .
			'<input type="password" name="password" id="password">' .
			'<input type="submit" name="submit" value="submit">' .
		    '</form>';
}
function logged_in_msg()
{
	echo '<p>Hola, te has autentificado correctamente!</p>';
}
function display_error_msg()
{
	echo '<p>Username or password is invalid</p>';
}
?>
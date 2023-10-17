<?php
	session_start();
	
	$_session['username']=$username;
	$_session['password']=$password;
	error_reporting(0);
?>
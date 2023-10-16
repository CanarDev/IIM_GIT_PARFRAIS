<?php session_start();
require('config/config.php');
require('model/functions.fn.php');



if(isset($_POST['email']) && isset($_POST['password'])  && isset($_POST['username'])){
	if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['username'])){

		$email = $_POST['email'];
		$password = $_POST['password'];
		$username = $_POST['username'];


		if(isUsernameAvailable($db, $username) == true){
			
			if(isEmailAvailable($db, $email) == true){

				userRegistration($db, $username, $email, $password);
				header('Location: login.php');

			}
			else{
				$error = 'Email indisponible';
			}
		}
		else{
			$error = 'Username indisponible';
		}
		
	}
}

include 'view/_header.php';
include 'view/register.php';
include 'view/_footer.php';

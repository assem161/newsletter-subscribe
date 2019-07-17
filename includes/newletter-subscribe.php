<?php
//check_ajax_referer( 'ajax-nonce', 'nonce', false );
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
    /* First, check nonce */
	$name 		= strip_tags(trim($_POST['name']));
	$email 		= filter_var(trim($_POST['email']),FILTER_SANITIZE_EMAIL);
	$subject 	= $_POST['subject'];
	$recipient 	= $_POST['recipient'];


	if(empty($name) || empty($email)){
		http_response_code(400);
		echo "fill all fields";
		exit;
	}

	$message = "Name: $name\n";
	$message .= "Email: $email\n\n";

	$headers= "From: $name <$email>";
	//echo $headers;
	//echo $name,$email,$subject,$recipient;
	if(mail($recipient,$subject,$message,$headers)){
		http_response_code(200);
		echo "You subscribed success";
	}else{
		http_response_code(400);
		echo "there is a problem try again";	
	}

	 die();

}else{
	http_response_code(403);	
	echo "there is in request a problem try again";	
}


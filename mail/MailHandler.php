<?php
	$stripHTML = true;
	$owner_email = "sylvester.magwaza@umuzi.org";
	// $headers = 'From:' . $_POST["contact_email"];
	$subject = 'Subject: ' . $_POST["contact_subject"];
	$messageBody = "";
	
	if($_POST['fname']!='nope'){
		$messageBody .= '<p><strong>First Name: </strong>' . $_POST["fname"] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}
	// if($_POST['lname']!='nope'){
	// 	$messageBody .= '<p><strong>Last Name: </strong>' . $_POST["lname"] . '</p>' . "\n";
	// 	$messageBody .= '<br>' . "\n";
	// }


	
	//if($_POST['contact_subject']!='nope'){
		//$messageBody .= '<p><strong>Subject: </strong>' . $_POST["contact_subject"] . '</p>' . "\n";
		//$messageBody .= '<br>' . "\n";
	//}

	if($_POST['Email']!='nope'){
		$messageBody .= '<p><strong>Email Address: </strong>' . $_POST['Email'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}else{
		$headers = '';
	}
	if($_POST['Number']!='nope'){		
		$messageBody .= '<p><strong>Phone Number: </strong>' . $_POST['Number'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}
  
	if($_POST['Message']!='nope'){
		$messageBody .= '<p><strong>Message: </strong>' . $_POST['Message'] . '</p>' . "\n";
	}
	
	if($stripHTML == 'true'){
		$messageBody = strip_tags($messageBody);
	}
	
	try{
		if(!mail($owner_email, $subject, $messageBody)){
			throw new Exception('mail failed');
		}else{
			header("Location: https://gwazi86.github.io/sylvester.github.io/");
			die();
			/*echo '<h3>Mail Sent</h3>';*/
		}
	}catch(Exception $e){
		echo $e->getMessage() ."\n";
	}
?>
<?php 
require 'include/phpmailer/PHPMailerAutoload.php';
	//if form is submitted
	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$city = $_POST['city'];
		$salary = $_POST['salary'];
		$startDate = $_POST['startDate'];
		$question = $_POST['question'];
		$file = $_FILES['cv']['name'];
		$type = $_FILES['cv']['type'];
		//check inputs is empty 
		if($name == "" or $email == "" or $phone == "" or $city == "" or $salary == "" or $startDate == "" or $question == ""){
			//you can add here meta refresh or redirect to previous page
			die("You must fill in the required fields");
		}else{
			//if all inputs is not empty
			//check allowed types 
			$allowed = array("image/jpeg", "application/pdf","application/msword","application/vnd.openxmlformats-officedocument.wordprocessingml.document");
			if(!in_array($type, $allowed)) {
				//here you can redirect to previous page
				die('Only jpg, doc,docx, and pdf files are allowed.');
			}
			//process sending mail
			//you must set the message 
			$msg = "here is your message";
			//Create a new PHPMailer instance
			$mail = new PHPMailer;
			//Set who the message is to be sent from
			$mail->setFrom($email, $name);
			//Set an alternative reply-to address 
			$mail->addReplyTo('phpcodertop@gmail.com', 'First Last');
			//Set who the message is to be sent to
			$mail->addAddress('phpcodertop@gmail.com', 'John Doe');
			//change it to your subject
			$mail->Subject = 'Job Application';
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//replace file_get_contents('contents.html'), dirname(__FILE__) with your body message or send posts to contents .html or can add the $msg instead
			$mail->msgHTML($msg);
			//Replace this with your alt message or can add the $msg
			$mail->AltBody = 'This is a test message';
			//Attach an image file
			if (isset($_FILES['cv']) &&
			    $_FILES['cv']['error'] == UPLOAD_ERR_OK) {
			    $mail->AddAttachment($_FILES['cv']['tmp_name'],
			                         $_FILES['cv']['name']);
			}

			//send the message, check for errors
			if (!$mail->send()) {
				//here you can redirect to failure page
			    echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
				//here you can redirect to success page
			    echo "Message sent!";
			}
			//

		}

	}

?>
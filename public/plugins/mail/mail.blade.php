<?php
$ok = false;
		//Checking if the e-mail is filled
		if (isset($_REQUEST['submit'])) {
			//Creating the conection with the Email
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->SMTPAuth = true;
			$mail->Host = "smtpout.secureserver.net";
			$mail->Port = "80";
			// $mail->SMTPSecure = 'ssl';
			$mail->Username = "hello@timoshockness.com";
			$mail->Password = "1599@Hello";

			//Catching the msg informations
			$name = $_POST['name'];
			$email = $_POST['email'];
			$telefone = $_POST['telefone'];
			$submit = $_POST['submit'];

			//Email which will recive the msg
			$my_email = "fisiostetica16@gmail.com";

			//Function to sent the e-mail
			$mail->From = "hello@timoshockness.com";
			$mail->FromName = "Fisiostetica Website";
			$mail->Subject = "Nova solicitacao de avaliacao gratuita";
			$mail->Body = "Nova solicitacao de Avaliacao Gratuita.<br />Name: ".$name. "<br />E-mail: ".$email."<br />Telefone: ".$telefone;
			$mail->IsHTML(true);
			$mail->AddAddress($my_email, "Najla Shockness");
			//$mail->Send();
			if($mail->Send()){
				$ok = true;
                // header('Location: email.php');
                // echo 'something is really wrong - OKAY - true';
			}else{
				// echo  "Something is wrong: " . $mail->ErrorInfo;
				$ok = false;
                // header('Location: email.php');
                // echo 'something is really wrong - OKAY - false';
			}
		}
?>
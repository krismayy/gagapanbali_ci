<?php 

class CustomMailer {
	public function __construct() {
		require_once 'PHPMailer/PHPMailerAutoload.php';
	}

	public function send_mail($from_email, $from_name, $to, $subject, $body) {
		$mail = new PHPMailer(); 
         
         try {
			$mail->SMTPDebug = 1;                                       // Enable verbose debug output
		    $mail->isSMTP();                                            // Set mailer to use SMTP
		    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		    $mail->Username   = 'krismasave1@gmail.com';                     // SMTP username
		    $mail->Password   = 'krismacantik26';                               // SMTP password
		    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
		    $mail->Port       = 587;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom($from_email, $from_name);
		    $mail->addAddress($to);               // Name is optional

		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = $subject;
		    $mail->Body    = $body;

		    $mail->send();
         } catch (Exception $e) {
         	// echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
         }
	}
}

?>
<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$mainType= $_POST['mainType'];
$mainDesign= $_POST['mainDesign'];
$mainAdaptive=$_POST['mainAdaptive'];
$userName= $_POST['userName'];
$userEmail= $_POST['userEmail'];
$userTel= $_POST['userTel'];
$userMessage= $_POST['userMessage'];




//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  						   // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = ''; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = ''; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom(''); // от кого будет уходить письмо?
$mail->addAddress(''); 
$mail->addAddress('');    // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с тестового сайта';
if('nameOfForm' == 'formOne'){
    $mail ->Body = "Имя: ".$userName. "<br>". "Почта: ". $userEmail."<br>"."Телефон: ". $userTel. "<br>"."Тип сайта: ".$mainType ."<br>"."Дизайн сайта: ".$mainDesign. "<br>"."Адаптивность: ".$mainAdaptive;
}
else if('nameOfForm' == 'formTwo'){
    $mail ->Body = "Имя: ".$userName. "<br>". "Почта: ". $userEmail. "<br>". $userMessage;
}
else{
    return false;
}
$mail->AltBody = '';

if(!$mail->send()) {
    return false;
} else {
    return true;
}
?>

<?php
$verificatie=0;
$hashpassword = password_hash($verificatie, PASSWORD_DEFAULT);
require("PHPMailer/class.phpmailer.php");
$bericht ='Nieuwe inschrijving van: helpdesk klik <a>hier</a href="bevestigingpagina.php"> om u account te bevestigen '.$hashpassword;
 
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->Username = 'willemhelpdesk@gmail.com';
$mail->Password = 'sfeer123';
$mail->setFrom('willemhelpdesk@gmail.com');
$mail->addAddress($_SESSION["GebruikerEmail"]);
$mail->Subject = 'bevestiging Mango helpdesk';
$mail->Body = $bericht;
$mail->WordWrap = 10000;

 

if(!$mail->Send()){
print'<h3>Bericht niet verzonden</h3><br>';

print'<p>Gelieven een mail te sturen met de errorcode naar volgend email adres.<br>
<div class="mail">
<input type="text" value="daanfostier@gmail.com" id="mail" readonly="readonly" style="max-width: 300px;">
<button onclick="copyButton()" style="border: none;border-radius: 2px;font-size: 31px; transform: translateY(7px);">Kopieer adres</button>
</div></p><br>';

echo '<h4>Error:</h4><input type="text" value="' . $mail->ErrorInfo.'" id="mail" readonly="readonly" style="max-width: 100%;resize: none;">';
} else {
header('location: http://daanfostier.itbusleyden.be/site/');
}
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;

    // CHANGE THESE
    $mail->Username   = 'chopraarman13@gmail.com';
    $mail->Password   = 'fqlp ctxg yafk fegb';

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // CHANGE THESE
    $mail->setFrom('chopraarman13@gmail.com', 'College Event System');
    $mail->addAddress('chopraarman13@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'PHPMailer Test';

    $mail->Body = '
    <h2>PHPMailer Working ✅</h2>
    <p>If you received this email, PHPMailer is configured successfully.</p>
    <p><b>College Event Management System</b></p>
    ';

    $mail->SMTPDebug = 2;
    $mail->Debugoutput = 'html';

    $mail->send();

    echo "✅ Message sent successfully";

} catch (Exception $e) {
    echo "❌ Mailer Error: " . $mail->ErrorInfo;
}
?>
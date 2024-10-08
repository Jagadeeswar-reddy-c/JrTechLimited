<?php
// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $education = $_POST['education'];
    $branch = $_POST['branch'];
    $college = $_POST['college'];
    $projectType = $_POST['project'];
    $projectDuration = $_POST['period'];
    $projectDescription = $_POST['discription'];
    $projectGoals = $_POST['project_goals'];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.example.com';  // Replace with your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = '209y1a0542@ksrmce.ac.in';  // Replace with your email
        $mail->Password   = 'zmblytabnyumeiil';  // Replace with your password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        //Recipients
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress($email, "$firstName $lastName");  // Send to user email
        $mail->addBCC('admin@example.com');  // Optional: Send a copy to admin

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Enquiry Form Submission';
        $mail->Body    = "
            <h1>New Enquiry Form Submission</h1>
            <p><b>Name:</b> $firstName $lastName</p>
            <p><b>Email:</b> $email</p>
            <p><b>Education:</b> $education</p>
            <p><b>Branch:</b> $branch</p>
            <p><b>College:</b> $college</p>
            <p><b>Project Type:</b> $projectType</p>
            <p><b>Project Duration:</b> $projectDuration</p>
            <p><b>Project Description:</b> $projectDescription</p>
            <p><b>Project Goals:</b> $projectGoals</p>
        ";
        $mail->AltBody = 'This is the plain text version of the message body';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

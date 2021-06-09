<?php
    use PHPMailer\PHPMailer\PHPMailer;

    if (isset($_POST['name']) && isset($_POST['email'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $body = $_POST['body'];

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        //$mail->Host = gethostbyname('smtp.gmail.com');
        //$mail->Host = "ssl://smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "software.engeeniyar@gmail.com";
        $mail->Password = 'mega@Zone.123';
        $mail->Port = 587; //465
        $mail->SMTPSecure = "tls"; //"ssl"; 
        $mail->SMTPDebug = 2;

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress("software.engeeniyar@gmail.com");
        $mail->Subject = $subject;
        $mail->Body = $body;

        if ($mail->send()) {
            $status = "success";
            $response = "Email is sent!";
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "response" => $response)));
    }
?>

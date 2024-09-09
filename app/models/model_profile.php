<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';



class Model_Profile extends Model {
    public function save($data) {
    }

    public function sendEmail($send_to, $message) {
        $config = include ROOT_DIR ."config.php";
        var_dump($config);

        $mail = new PHPMailer(true);
        var_dump($mail);

        try {
            // $mail->SMTPDebug = 2;  // Вы можете установить 2 для более подробной отладки
            // $mail->Debugoutput = 'html'; 

            $mail->isSMTP();
            $mail->Host = 'stmp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $config['mail']["smtp_user"];
            $mail->Password = $config['mail']["smtp_password"];
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            
            $mail->setFrom($config['mail']["smtp_user"], 'AllGall');
            $mail->addAddress($send_to);

            $mail->isHTML(true);
            $mail->Subject = 'From forma and sidebar';
            $mail->Body = $message;
            $mail->AltBody = 'Это тестовое сообщение в формате plain text';

            $mail->send();
            echo 'mail sended';
        } catch (Exception $e) {
            echo 'sending mail error: '.$mail->ErrorInfo;
        }


    }       
}
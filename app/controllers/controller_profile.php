<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


class Controller_Profile extends Controller {
    function __construct() 
    {
        $this->model = new Model_Profile();
        $this->view = new View();
    }

    function action_index() {
        $css_path =  '../css/cblocks/profile.css';
        $js_path = '../js/cblocks/profile.js';
        // print_r($css_path);
        // $this->model->sendMessageToEmail('all.gall1@mail.ru', 'dkdkkdkd');
        $this->view->generate('profile_view.php', 'template_view.php', null, $css_path, $js_path);
    }

    function action_save_info() {
        $dd = $_SERVER['REQUEST_METHOD'];


        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->sendEmail($_POST['email'], "Data was saved");
            header("Location: /profile/success");
            exit;
        }
        // $this->sendEmail();
    }

    function action_success() {
        $this->view->generate('success_view.php', 'template_view.php', null);
    }
    private function sendEmail($send_to, $message) {
        $config = include ROOT_DIR ."config.php";

        $mail = new PHPMailer(true);

        try {
            // $mail->SMTPDebug = 2;  // Вы можете установить 2 для более подробной отладки
            // $mail->Debugoutput = 'html'; 

            $mail->isSMTP();
            $mail->Host =  $config['mail']["smtp_host"];
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
        } catch (Exception $e) {
        }


    }    
}
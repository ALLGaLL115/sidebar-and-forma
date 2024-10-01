<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


class Controller_Cabinet extends Controller {
    function __construct() 
    {
        $this->model = new Model_Cabinet();
        $this->view = new View();
    }


    function action_index() {
        $css_path =  '../css/cblocks/cabinet.css';
        $js_path = '../js/cblocks/cabinet.js';
        // print_r($css_path);
        // $this->model->sendMessageToEmail('all.gall1@mail.ru', 'dkdkkdkd');
        $this->view->generate('profile_view.php', 'cabinet_view.php', null, $css_path, $js_path);
    }

    function action_save_info() {
        header('Content-Type: application/json');

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $errors = [];

            if (empty($email)) {
                $errors['email'] = 'This is required field';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Неверный формат email';
            }

            if (empty($errors)) {
                $this->sendEmail($email, "Data was saved");
                echo json_encode(['success' => 'true', 'email' => $email]);
            } else {
                echo json_encode(['success' => 'false', 'errors' => $errors]);
            }
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
<?php
    require_once ROOTKERNEL . '/config/Exception.php';
    require_once ROOTKERNEL . '/config/PHPMailer.php';
    require_once ROOTKERNEL . '/config/SMTP.php';

    $mail = new \PHPMailer\PHPMailer\PHPMailer();
    $mail->CharSet = 'utf-8';
    $mail->isSMTP();
    $mail->Host = 'smtp.timeweb.ru';
    $mail->SMTPAuth = true;
    $mail->Username = 'password_recovery@dedal-service.ru'; // Ваш логин в Яндексе. Именно логин, без @yandex.ru
    $mail->Password = '5MduQxLb'; // Ваш пароль
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('password_recovery@dedal-service.ru'); // Ваш Email

    function send_email($mail, $address, $subject, $body){

        if(is_array($address)){
            foreach($address as $item){
                $mail->addAddress($item); // Email получателя
                // Письмо
                $mail->isHTML(true);
                $mail->Subject = $subject; // Заголовок письма
                $mail->Body =$body; // Текст письма// Результат
            if(!$mail->send()) {
                echo '‘Message could not be sent.’';
                echo '‘Mailer Error: ‘' . $mail->ErrorInfo;
            } else {
                echo '‘ok’';
            }
            }
        }
        else{
            $mail->addAddress($address); // Email получателя
            // Письмо
            $mail->isHTML(true);
            $mail->Subject = $subject; // Заголовок письма
            $mail->Body =$body; // Текст письма// Результат
            $mail->send();
        }

    }
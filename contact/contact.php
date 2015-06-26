<!-- Contact form PHP script -->

<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = "stepan2212122@gmail.com"; // Replace xxxx@xxxx.com with your email address (mandatory!) 
    $subject = "Форма написать нам ЦПВ ДВФУ"; // Choose a custom subject (not mandatory)

    $body = "Вам пришло сообщение от " . $name . " (" . $email . "):\n\n" . $message;

    $from = "От: ЦПВ ДВФУ"; // Replace "Beetle Template" with your site name (not mandatory)   
    $headers = "ОТ:" . $from . "\r\n";
    $headers .= "Ответ: " . $email . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();    
                
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if ($name != '' && $email != '' && $message != '') {
                
            if (mail ($to, $subject, $body, $headers)) { 
                echo '<p style="color:#66A325;">Спасибо! Ваше сообщение отправлено.</p>';
            } else { 
                echo '<p style="color:#F84B3C;">Что-то пошло не так, попробуйте снова.</p>'; 
            } 

        } else {
            echo '<p style="color:#F84B3C;">Необходимо заполнить все поля!</p>';
        }
    } else {
        echo '<p style="color:#F84B3C;">Неправильный Email, пожалуйста, введите правильный Email.</p>';
    }  

    // Use the script below if you want to use HTML emails instead

    /*

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = 'xxxx@xxxx.com'; // Replace xxxx@xxxx.com with your email address (mandatory!) 
    $subject = 'Hello'; // Choose a custom subject (not mandatory)

    $body = '<html><body>';
    $body .= '<em style="color: #999;">You have received a message from <strong>' . $name . '</strong> (' . $email . '):</em>';
    $body .= '<p>' . $message . '</p>';
    $body .= '</body></html>';

    $from = "From: Beetle Template"; // Replace "Beetle Template" with your site name (not mandatory)   
    $headers = "From:" . $from . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();    
                
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if ($name != '' && $email != '' && $message != '') {
                
            if (mail ($to, $subject, $body, $headers)) { 
                echo '<p style="color:#66A325;">Thanks! Your message has been sent.</p>';
            } else { 
                echo '<p style="color:#F84B3C;">Something went wrong, go back and try again!</p>'; 
            } 

        } else {
            echo '<p style="color:#F84B3C;">You need to fill in all required fields!</p>';
        }
    } else {
        echo '<p style="color:#F84B3C;">Invalid Email, please provide an correct email.</p>';
    }   

    */  

?>
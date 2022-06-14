<?php
    session_start();
    include '../config.php';
    $url = $baseUrl;
    $smtp = include '../smtp.php';
    require '../assets/PHPMailer/PHPMailerAutoload.php';

    $username = post('usernameForget');

    // SELECT MATCH FROM THE DATABASE
    $query      = 'SELECT * FROM `users` where username=? ';
    $parameters = array($username);
    $statement  = $db->prepare($query);
    $statement->execute($parameters);

if ($statement->rowCount() > 0) {

    $data = $statement->fetch(PDO::FETCH_ASSOC);

    // Forget Key generation Login
    $forgetKey = sha1($encryptionKey . $username);

    $statement = $db->prepare('UPDATE `users` SET forget_key = ?  where username=? ');
    $statement->execute(array($forgetKey, $username));

    // Email verification------------
    $mail = new PHPMailer(); // create a new object
    $mail->IsHTML(true);
    $mail->WordWrap = 50;

    // If Smtp is set true. Then the email will be sent using smtp
    if ($GLOBALS['SMTP'] == true) {
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPAuth   = true; // authentication enabled
        $mail->SMTPSecure = $smtp['encryption']; // secure transfer enabled REQUIRED for Gmail
        $mail->Host       = $smtp['host'];
        $mail->Port       = $smtp['port']; // or 587
        $mail->Username   = $smtp['username'];
        $mail->Password   = $smtp['password'];
        $mail->From       = $smtp['from']['address'];
        $mail->FromName   = $smtp['from']['name'];
    }
    else
        {
        $mail->SetFrom($fromAddress);
    }

    $mail->addAddress($data['email'], $data['name']);     // Add a recipient

    // Fetch email template
    $template = file_get_contents('../email_template.php');
    $body     = 'Welcome <strong>{'.$data['name'].'}</strong>
        <hr>
        Please follow the below link to reset your password
        <br>
        <a href='.$url.'/reset_password.php?key='.$forgetKey.'>'.$url.'reset_password.php?key='.$forgetKey.'</a>';

    $mail->Subject = 'Reset Password';
    $mail->Body    = str_replace('#BODY#', $body, $template);

    if (!$mail->send()) {
        $output = responseError($mail->ErrorInfo);
    }
    else
    {
        $output = responseSuccess('Reset password mail sent to <b>' . $data['email'] . '</b>');
    }

} else {

    $output = responseError('This username is not registered. Please type the correct username');
}
echo json_encode($output);

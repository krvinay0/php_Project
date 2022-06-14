<?php
    session_start();
    include '../config.php';
    $smtp = include '../smtp.php';
    error_reporting(0);
    require '../assets/PHPMailer/PHPMailerAutoload.php';

    $captcha   = post('g-recaptcha-response');

    $googleUrl = 'https://www.google.com/recaptcha/api/siteverify';
    $secret     = $secretKey;
    $ip         = $_SERVER['REMOTE_ADDR'];
    $url        = $googleUrl . '?secret=' . $secret . '&response=' . $captcha . '&remoteip=' . $ip;
    $res        = getCurlData($url);
    $res        = json_decode($res, true);

    // Set base url
    // $baseUrl = preg_replace('/\/ajax\/register.php/', '', $_SERVER['PHP_SELF']);

// Server side validation

if (empty($captcha)) {

    $output = responseError('Please Enter the Captcha');
    die(json_encode($output));

}

$output = [];
$input['passwordRegister'] = post('password');

$input = [];
$input['nameRegister'] = post('nameRegister');
$input['usernameRegister'] = post('usernameRegister');
$input['emailRegister'] = post('emailRegister');
$input['passwordRegister'] = post('passwordRegister');;
$input['cpasswordRegister'] = post('cpasswordRegister');;

$output = responseFormErrors($input);


if($output['error']) {

    foreach ($output['errors'] as $key => $out) {

        $output['errors'][$key] = preg_replace('/Register/', '', $out[0]);

        if($key == 'cpasswordRegister') {
            $output['errors'][$key] = preg_replace('/c/', 'confirm ', $output['errors'][$key]);
        }
    }

    echo json_encode($output);
    die;
}

// Check password and confirm password match or not
else if ($input['cpasswordRegister'] != $input['passwordRegister']) {
    $output['errors']['passwordRegister'] = 'Password and confirm password do not match';
    $output['status'] = 'fail';
}
else if (!filter_var($input['emailRegister'], FILTER_VALIDATE_EMAIL)) {

    $output['errors']['emailRegister'] = 'Enter correct Email ID';
    $output['status'] = 'fail';
    echo json_encode($output);
    die;
}
// Insert the data into the database
else {

    // SELECT MATCH FROM THE DATABASE
    $query     = 'SELECT * FROM `users` where username=?';
    $statement = $db->prepare($query);
    $statement->execute(array($input['usernameRegister']));

    if ($statement->rowCount() > 0) {

        $output['errors']['usernameRegister'] = 'Username Already exists.Try another username.';
        $output['status'] = 'fail';
        echo json_encode($output);
        die;

    } else {

        // Generate key for email verification
        $key = sha1($encryptionKey . $input['usernameRegister'] . $input['emailRegister']);

        // Encrypt password according to encryption type defined in config.php
        if($encryptionType == 'sha1') {
            $input['passwordRegister'] = sha1($input['passwordRegister']);
        }
        elseif ($encryptionType == 'md5') {
            $input['passwordRegister'] = md5($input['passwordRegister']);
        }

        $query      = 'INSERT INTO `users` SET username=? , password =? , name = ? ,email = ?,`key` = ?,status = ?,email_verified =?';
        $parameters = array($input['usernameRegister'], $input['passwordRegister'], $input['nameRegister'], $input['emailRegister'], $key, 'enable', 'no');

        $statement = $db->prepare($query);
        $statement->execute($parameters);


        // Email verification
        $mail = new PHPMailer(); // create a new object
        $mail->IsHTML(true);
        $mail->WordWrap = 50;  // Set word wrap to 50 characters

        // Check E-mail verification is true or false
        if($emailVerification) {
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
            else {
                $mail->SetFrom($fromAddress);
            }

            $template = file_get_contents('../email_template.php');
            $body     = 'Welcome <strong>'.$input['nameRegister'].'</strong>,
                        <br>
                        Thank you for signing up!
                        <br>
                        <br>
                        Your account has been created, you can login to your account after you have activated your account by pressing the url below.
                        <br>
                        <br>
                        
                        Please click on the link below or copy it into your browser address line:<br>
                        <a href='.$baseUrl.'/confirm.php?key='.$key.'>'.$baseUrl.'/confirm.php?key='.$key.'</a>
                ';

                $mail->addAddress($input['emailRegister'], $input['emailRegister']);     // Add a recipient
                $mail->Subject = 'Confirm Your Email Address';
                $mail->Body    = str_replace('#BODY#', $body, $template);

            if (!$mail->send()) {
                $output = responseSuccess($mail->ErrorInfo);

            } else {
                $output = responseSuccess('success');

            }

            // End email verification
            $output = responseSuccess('Mail sent to your email.Please verify your email to get Registered');
        }
        else {

            $output = responseSuccess('User successfully registered');

        }
    }
}
    echo json_encode($output);
?>
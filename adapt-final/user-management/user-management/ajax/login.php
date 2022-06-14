<?php
    session_start();

    include '../config.php';

    $userName = post('username');
    $password = post('password');
    $remember = post('remember');

// Encrypt password according to encryption type defined in config.php
if($encryptionType == 'sha1') {
    $password = sha1($password);

} elseif ($encryptionType == 'md5') {
    $password = md5($password);
}

    // SELECT MATCH FROM THE DATABASE
    $query      = 'SELECT * FROM `users` where username=? and password=?';
    $parameters = array($userName, $password);
    $statement  = $db->prepare($query);
    $statement->execute($parameters);

if ($statement->rowCount() > 0) {

    $data = $statement->fetch(PDO::FETCH_ASSOC);

        // Check if the status of user is enabled or disabled
    if ($data['status'] == 'disable') {

        $output = responseError('The user is currently disabled');
        echo json_encode($output);
        exit();
    }

        // Check E-mail verification is true or false
    if($emailVerification) {
        // Check if the email  of user is verified or not
        if ($data['email_verified'] == 'no') {

            $output = responseError('Your email is not verified.Please verify your email to get logged in');

        } else {

            // Enabled users
            $_SESSION['name'] = $data['name'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['table'] = 'user';
            $_SESSION['user'] = true;

            // Last login update
            $query = 'UPDATE `users` SET lastlogin_at = NOW() where username=?';
            $statement = $db->prepare($query);
            $statement->execute(array($userName));

            if(!empty($remember)) {

                setcookie ('username', $userName, time() + (10 * 365 * 24 * 60 * 60), '/');
                setcookie ('userPassword', $password, time() + (10 * 365 * 24 * 60 * 60), '/');
                setcookie ('name', $data['name'], time() + (10 * 365 * 24 * 60 * 60), '/');
                setcookie ('table', 'user', time() + (10 * 365 * 24 * 60 * 60), '/');
            }
            else {
                if(isset($_COOKIE['username'])) {
                    setcookie ('username', '');
                }

                if(isset($_COOKIE['userPassword'])) {
                    setcookie ('userPassword', '');
                }
            }
            
            $output = responseRedirect('user/dashboard.php', 'Logged in Successfully');
        }

    } else {

        if(!empty($remember)) {
            setcookie ('username', $userName, time() + (10 * 365 * 24 * 60 * 60), '/');
            setcookie ('userPassword', $password, time() + (10 * 365 * 24 * 60 * 60), '/');
            setcookie ('name', $data['name'], time() + (10 * 365 * 24 * 60 * 60), '/');
            setcookie ('table', 'user', time() + (10 * 365 * 24 * 60 * 60), '/');
            setcookie ('user', true, time() + (10 * 365 * 24 * 60 * 60), '/');
        }
        else {
            if(isset($_COOKIE['username'])) {
                setcookie ('username', '');
            }

            if(isset($_COOKIE['userPassword'])) {
                setcookie ('userPassword', '');
            }
        }

        // Enabled users
        $_SESSION['name'] = $data['name'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['table'] = 'user';
        $_SESSION['user'] = true;

        // Last login update
        $query     = 'UPDATE `users` SET lastlogin_at = NOW() where username=?';
        $statement = $db->prepare($query);
        $statement->execute(array($userName));



        $output = responseRedirect('user/dashboard.php', 'Logged in Successfully');

    }

} else {

    $output = responseError('Wrong Login Details');
}
    echo json_encode($output);
?>
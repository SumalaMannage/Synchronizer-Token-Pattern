<!--
/**
* Registration No:IT17069564
 * Name: M.S.D.S Mannage
 * Date: 17/05/2019
 */
 -->
<!DOCTYPE html>
<html>

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="style.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Cross Site Request Forgery Protection</title>
</head>

<body>
    <div class="container h-80">
        <div class="row align-items-center h-100">
            <div class="col-3 mx-auto">
                <div class="text-center">
                    <img id="profile-img" class="rounded-circle profile-img-card" src="https://i.imgur.com/6b6psnA.png" />
                    <p id="profile-name" class="profile-name-card"></p>

                    <form class="form-signin" action="index.php" method="post">
                        <input type="text" name="username" id="username" class="form-control form-group" placeholder="username" required autofocus>
                        <input type="password" name="password" id="inputPassword" class="form-control form-group" placeholder="password" required>
                        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" id="submit" name="submit">enter</button>
                    </form><!-- /form -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    userLogin();
}
?>

<?php

function userLogin()
{
    if (isset($_POST['username'], $_POST['password'])) {
        if ($_POST['username'] == 'admin' && $_POST['password'] == 'password') {
            session_set_cookie_params(200);
            session_start();
            session_regenerate_id();

            $session_id = session_id();
            setcookie('session_cookie', $session_id, time() + 200, '/'); //genarate session cookie

            $myInfo = fopen("Tokens.txt", "a") or die("Unable to open file!"); //create text file to store token and session ID
            fwrite($myInfo, $session_id); //save session id to text file

            $_SESSION['CSRF_TOKEN'] = sha1(base64_encode(openssl_random_pseudo_bytes(32))); //genarate random token
            $_token = "," . $_SESSION['CSRF_TOKEN'] . "\r\n";
            fwrite($myInfo, $_token); //save token to the text file
            fclose($myInfo);

            echo "<script>alert('Successfully logged in.')</script>";

            header("Location:home.php");
            exit;
        } else {
            echo "<script>alert('Invalid Credentials, Please try again.')</script>";
        }
    }
}

?>
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

                    <?php
                    if (isset($_COOKIE['session_cookie'])) {
                        session_start();

                        if ($_POST['CSRF_Token'] == $_SESSION['CSRF_TOKEN']) {
                            $write = $_POST['write']; ?>

                            <label for="username" class="text-white">
                                <h4>CSRF Token Validation Successful..<h4>
                            </label><br>

                        <?php    } else {
                        echo "<script>alert('WARNING :: CSRF Tokens not match!!!')</script>";
                    }
                }
                ?>

                    <form class='form-signin' action='logout.php' method='post'>

                        <button class='btn btn-lg btn-primary btn-block btn-signin' type='submit'>Logout</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
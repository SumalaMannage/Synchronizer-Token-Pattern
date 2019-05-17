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
                    if (isset($_COOKIE['session_cookie']))
                        session_start();
                    $visit = $_COOKIE['session_cookie']; ?>

                    <form class='form-signin' action='control.php' method='post'>
                        <label for='username' class='text-white'>
                            <h4>Write Something<h4>
                        </label><br>
                        <input type='text' name='write' id='write' class='form-control form-group' placeholder='No One' required autofocus>
                        <div id='div1'>
                            <input type='hidden' name='CSRF_Token' value='' id='CSRF_Token' />
                        </div>
                        <button class='btn btn-lg btn-primary btn-block btn-signin' type='submit'>enter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var request = "true";
        $.ajax({
            url: "CSRF_Endpoint.php",
            method: "POST",
            data: {
                request: request
            },
            dataType: "JSON",
            success: function(data) {
                document.getElementById("CSRF_Token").value = data.token;
            }

        })
    </script>

</body>

</html>
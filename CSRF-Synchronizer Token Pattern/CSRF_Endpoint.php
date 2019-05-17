<?php
/**
 * Registration No:IT17069564
 * Name: M.S.D.S Mannage
 * Date: 17/05/2019
 */
?>
 
<?php

session_start();
if (isset($_POST['request'])) {

    $myInfo = fopen("Tokens.txt", "r") or die("Unable to open file!");

    while (!feof($myInfo)) {
        $line = fgets($myInfo);

        if (strpos($line, $_COOKIE['session_cookie']) !== false) {

            list($sid, $CSRFtoken) = explode(",", chop($line), 2);

            $data['token'] = $CSRFtoken;

            echo json_encode($data);
        }
    }

    fclose($myInfo);
}

?>
<?php
include("defines.php");
include('config.php');

function welcomeMessage() {
    $message = WELCOME . " " . SERVERNAME;
    echo '<div class="alert alert-primary" role="alert">' . $message . '</div>';
}

function formProcess() {
    if (isset($_POST['submit'])) {
        global $connection;

        $account = $_POST['username'];
        $email = $_POST['email'];
        $social_id = $_POST['social_id'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];

        //mysqli_real_escape_string
        $new_account = mysqli_real_escape_string($connection, $account);
        $new_email = mysqli_real_escape_string($connection, $email);
        $new_social_id =mysqli_real_escape_string($connection, $social_id);
        $new_password = mysqli_real_escape_string($connection, $password);

        //Check if username is already in the database.
        $checkUser = "SELECT login FROM account.account WHERE login='{$account}'";
        $usrCheck = mysqli_query($connection, $checkUser) or die('Query failed' . mysqli_error($connection));

        if (!ctype_alnum($new_account)) {
            errorBox("Numele de utilizator nu poate conține caractere speciale!");
        } elseif (strlen($account) < LOGIN_MIN_LEN) {
            errorBox("Numele de utilizator este prea mic!");
        } elseif(strlen($account) > LOGIN_MAX_LEN) {
            errorBox("Numele de utilizator este prea mare!");
        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            errorBox("Adresa de email introdusă nu este validă!");
        } elseif(strlen($password) < PWD_MIN_LEN) {
            errorBox("Parola aleasă este prea mică!");
        } elseif(strlen($password > PWD_MAX_LEN)) {
            errorBox("Parola aleasă este prea mare!");
        } elseif(strlen($social_id) !== SECURITY) {
            errorBox("Codul de ștergere trebuie să fie de 7 caractere!");
        } elseif($password !== $repassword) {
            errorBox("Parolele nu coincind!");
        } elseif (mysqli_num_rows($usrCheck) > 0){
            errorBox("Există deja un cont cu numele $account :(");
        } elseif($account && $email && $social_id && $password) {
            //Trecem de verificări și dacă datele sunt valide, atunci facem contul în sfârșit.
            $createAccount = "INSERT INTO account.account(login, email, social_id, password) ";
            $createAccount .= "VALUES ('$new_account', '$new_email', '$new_social_id', PASSWORD('$new_password'))";
            $result = mysqli_query($connection, $createAccount) or die('Query failed' . mysqli_error($connection));

            if (!$result) {
                errorBox("Ceva a mers prost!");
            } else {
                success("Contul tău a fost creat cu succes!");
                if (SHOW_DETAILS) {
                    echo '<div class="alert alert-success" role="alert"><table class="table">
                    <thead>
                      <tr>
                        <th scope="col">'. CONF_ACC['CONF_DATA'] .'</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">'. CONF_ACC['ACCOUNT'] . $account . '</th>
                      </tr>
                      <tr>
                        <th scope="row">'. CONF_ACC['EMAIL'] . $email . '</th>
                      </tr>
                      <tr>
                        <th scope="row">'. CONF_ACC['SECURITY'] . $social_id . '</th>
                      </tr>
                      <tr>
                        <th scope="row">'. CONF_ACC['PASSWORD'] . $password . '</th>
                      </tr>
                    </tbody>
                  </table></div>
                    ';
                }
            }

        } else { //Dacă nici un caz de mai sus atunci returnăm o eroare.
            errorBox("A apărut o eroare necunoscută!");
        }
    }
}

function errorBox($error) {
    echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
}

function success($success) {
    echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
}
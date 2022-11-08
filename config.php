<?php
/* Conectare simplă la baza de date.
IP, USER, PAROLĂ, DATABASE
EG. 191.111.151.1, root, PAROLA, account
*/

$connection = mysqli_connect('191.111.151.1', 'root', 'PAROLA', 'account');
if (!$connection) {
    die("Nu m-am putut conecta la baza de date...");
}

<?php

//De aici definim numele serverului și mesajul de bun venit de pe pagină
define("SERVERNAME", "Metin2TestServer");
define("WELCOME", "Bun venit pe pagina de înregistrare a serverului");
define("SHOW_DETAILS", true); // Arată datele contului după înregistrare : true = da / false = nu

const LOGIN_MIN_LEN = 4;
const LOGIN_MAX_LEN = 16;
const PWD_MIN_LEN = 5;
const PWD_MAX_LEN = 16;
const SECURITY = 7;


//Traducere formular
const FORM_LANG = [
    "FORM_ACC" => "Numele contului",
    "FORM_EMAIL" => "Adresă de email",
    "FORM_DELETE" => "Cod de ștergere caracter",
    "FORM_PWD" => "Parolă",
    "FORM_REPWD" => "Confirmare parolă",
    "REGISTER" => "Înregistrare"
];

//Confirmare detalii (SHOW_DETAILS)
const CONF_ACC = [
    "CONF_DATA" => "Datele înregistrate:",
    "ACCOUNT" => "Nume cont: ",
    "EMAIL" => "Adresă de email: ",
    "SECURITY" => "Cod de ștergere: ",
    "PASSWORD" => "Parolă: "
];

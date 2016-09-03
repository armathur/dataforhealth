<?php 

include "phpqrcode/qrlib.php";



session_start();


$vcard = "BEGIN:VCARD\r\nVERSION:3.0\r\n
N:".$_SESSION['name'].";  \r\n
FN:".$_SESSION['name']." \r\n
//ORG:Example ".$_SESSION['dob']."\r\n
    //TEL;TYPE=work,voice:" . $_SESSION['phone1'] . "\r\n
TEL;TYPE=cell,voice:". $_SESSION['phone1'] . "\r\n

EMAIL;TYPE=internet,pref:".$_SESSION['email']."\r\n 
END:VCARD;";



QRcode::png($vcard);
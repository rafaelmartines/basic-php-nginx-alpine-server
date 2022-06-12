<?php 



$date=date('l jS \of F Y h:i:s A');

$subject=$_POST['subject'];

$email=$_POST['email_to'];

$message=$_POST['message'];


 define('UPLOAD_DIR', 'uploads/');

 $img = $_POST['img'];

 $img = str_replace('data:image/png;base64,', '', $img);

 $img = str_replace(' ', '+', $img);

 $data = base64_decode($img);

 $file = UPLOAD_DIR . $email . '.png';

 file_put_contents($file, $data);

 

$add = '"https://bdplay2.websiteseguro.com/' . $file . '"';





$msg ="<html>

<head>

<style>

 

table {

    

    font-family: arial, sans-serif;

    border-collapse: collapse;

    width: 100%;

}



td, th {

    

    

    border: 1px solid black;

    border-collapse: collapse;

     

   

    padding: 8px;

}



th {background-color: DarkKhaki  ;

 text-align: center;

 }

td {background-color: OliveDrab ;}

td {color: white ;

text-align: center;}





</style>

</head>

<body>



<table>

<th>Picture sent on $date</th>



<tr>

<td>$message</td> 

</tr>





</table>



<img src=$add>



</body>



</html>";

$phpversion = phpversion();
$headers = <<<HEADERS
Content-type:text/html;charset=UTF-8\n
MIME-Version: 1.0\n
From: naoresponda@bd.com\n
Reply-To: cs_brasil@bd.com\n
X-Mailer: PHP/{$phpversion}\n
Return-Path: naoresponda@bd.com\n
HEADERS;

$enviarEmail = mail($email,$subject,$msg,$headers);

var_dump($enviarEmail);








?>
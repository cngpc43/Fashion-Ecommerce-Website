<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

$products = [
    [
        "name" => "product1",
        "price" => 20,
    ],
    [
        "name" => "product2",
        "price" => 40,
    ],
    [
        "name" => "product3",
        "price" => 40,
    ],
];

$mail = new PHPMailer(true);

try {
    $mail->isSMTP(); // using SMTP protocol
    $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->Username = 'hoangtu4520031234@gmail.com'; // sender's email address
    $mail->Password = 'kvos pwet spbo ceea'; // sender's email password
    $mail->SMTPSecure = 'tls'; // for an encrypted connection
    $mail->Port = 587; // port for SMTP

    $mail->setFrom('hoangtu4520031234@gmail.com', 'Sender Name'); // sender's email and name
    $mail->addAddress('21522737@gm.uit.edu.vn', 'Receiver Name'); // receiver's email and name

    $mail->Subject = 'Test subject';
    
    $body = 'Dear Receiver, <br><br>Here is the bill of product details:<br><br>';
    $totalPrice = 0;
    
    foreach ($products as $product) {
        $name = $product['name'];
        $price = $product['price'];
        $body .= "Product Name: $name<br>Price: $price<br><br>";
        $totalPrice += $price;
    }
    
    $body .= "Total Price: $totalPrice<br><br>Thank you for your purchase!";
    
    $mail->Body = $body;
    $mail->IsHTML(true); // Set email body format as HTML

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>
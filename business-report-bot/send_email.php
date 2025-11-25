<?php

// 1. Cargar la clase SendGridMailer que creamos
require 'sendgrid/sendgrid.php';

// 2. Obtener email y archivo generado
$to = $_GET['email'];
$file = $_GET['file'];

// 3. Leer el contenido del archivo del reporte
$content = file_get_contents($file);

// 4. Colocar tu API KEY de SendGrid AQUÍ
$apiKey = "SXAANZR9UUE3JAMR8UUFNACD";

// 5. Crear objeto mailer
$mailer = new SendGridMailer($apiKey);

// 6. Enviar
$result = $mailer->send(
    $to,
    "Reporte Automático",
    $content
);

echo "Resultado del envío: $result";

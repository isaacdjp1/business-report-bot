<?php

// Asegurar que sí llegó un archivo
if (!isset($_FILES['csv_file'])) {
    die("No CSV file uploaded.");
}

// Carpeta donde guardamos el CSV
$target_dir = "uploads/";
$file_name = time() . "_" . basename($_FILES["csv_file"]["name"]);
$target_file = $target_dir . $file_name;

// Mover archivo al servidor
move_uploaded_file($_FILES["csv_file"]["tmp_name"], $target_file);

// Leer CSV completo
$data = array_map('str_getcsv', file($target_file));

// La primera fila son columnas
$columns = $data[0];

// El resto de filas son datos
$rows = array_slice($data, 1);

// Crear HTML del reporte
$report_html = "<h1>Reporte Automático</h1>";
$report_html .= "<table border='1' cellpadding='5' cellspacing='0'><tr>";

// Agregar encabezados
foreach ($columns as $c) {
    $report_html .= "<th>$c</th>";
}

$report_html .= "</tr>";

// Agregar filas
foreach ($rows as $row) {
    $report_html .= "<tr>";
    foreach ($row as $cell) {
        $report_html .= "<td>$cell</td>";
    }
    $report_html .= "</tr>";
}

$report_html .= "</table>";

// Guardar reporte
$report_file = "reports/report_" . time() . ".html";
file_put_contents($report_file, $report_html);

// Obtener email
$email = $_POST['email'];

// Redirigir a send_email.php
header("Location: send_email.php?email=$email&file=$report_file");
exit;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Business Report Bot</title>
</head>
<body>

<h2>Subir archivo CSV para generar reporte</h2>

<form action="process.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="csv_file" required>
    <br><br>
    <input type="email" name="email" placeholder="Enviar reporte a..." required>
    <br><br>
    <button type="submit">Generar Reporte</button>
</form>

</body>
</html>

<?php 
// Conexión con la base de datos
include("acceder.php");

// Obtener el CIF del formulario si se ha enviado
$cif = isset($_GET["cif"]) ? trim($_GET["cif"]) : "";

// Construir la consulta SQL con filtro si se ingresó un CIF
if (!empty($cif)) {
    $sql = "SELECT * FROM `contratos base de datos` WHERE `CIF` LIKE :cif";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":cif", "%$cif%"); // Buscar coincidencias parciales
    $stmt->execute();
} else {
    $sql = "SELECT * FROM `contratos base de datos`";
    $stmt = $pdo->query($sql);
}

$contratos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial Contratos</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="styles/styles_registros.css">
</head>
<body>

<div class="navbar"> <!--Clase para la barra de navegación -->
    <a href="main.html" class="logo">Servicio Municipal de Aguas</a>
</div>

<h2>Historial</h2>

<div class="Filtro">
    <form method="GET">
        <label for="cif">Filtrar por CIF:</label>
        <input type="text" name="cif" id="cif" value="<?= htmlspecialchars($cif) ?>">
        <button type="submit">Filtrar</button>
    </form>
</div>

<table>
    <thead>
        <tr>
            <th>Nº Registro Contrato</th>
            <th>Nº Suministro</th>
            <th>Nombre</th>
            <th>CIF</th>
            <th>Dirección</th>
            <th>Contacto</th>
            <th>Tipo Contrato</th>
            <th>Observaciones</th>
            <th>NºContador</th>
            <th>Fecha Orden Instalación</th>
            <th>Fecha Instalación</th>
            <th>Boletín de Instalación</th>
            <th>Tipo Contador</th>
            <th>Fraudes</th>
            <th>Cerradura Amaestrada</th>
            <th>Ruta</th>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
            <th>Operario</th>
            <th>Expediente</th>
            <th>Colector</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contratos as $row) { ?>
        <tr>
            <td><?= htmlspecialchars($row["NºRegContrato"]) ?></td>
            <td><?= htmlspecialchars($row["NºSuministro"]) ?></td>
            <td><?= htmlspecialchars($row["Nombre"]) ?></td>
            <td><?= htmlspecialchars($row["CIF"]) ?></td>
            <td><?= htmlspecialchars($row["Direccion"]) ?></td>
            <td><?= htmlspecialchars($row["Contacto"]) ?></td>
            <td><?= htmlspecialchars($row["Tipo Contrato"]) ?></td>
            <td><?= htmlspecialchars($row["Observaciones"]) ?></td>
            <td><?= htmlspecialchars($row["NºContador"]) ?></td>
            <td><?= htmlspecialchars($row["fecha orden instalacion"]) ?></td>
            <td><?= htmlspecialchars($row["fecha instalacion"]) ?></td>
            <td><?= htmlspecialchars($row["boletin de instalador"]) ?></td>
            <td><?= htmlspecialchars($row["tipo de contador"]) ?></td>
            <td><?= htmlspecialchars($row["fraudes"]) ?></td>
            <td><?= htmlspecialchars($row["cerradura amaestrada"]) ?></td>
            <td><?= htmlspecialchars($row["ruta"]) ?></td>
            <td><?= htmlspecialchars($row["hora inicio"]) ?></td>
            <td><?= htmlspecialchars($row["hora fin"]) ?></td>
            <td><?= htmlspecialchars($row["OPERARIO"]) ?></td>
            <td><?= htmlspecialchars($row["EXPEDIENTE"]) ?></td>
            <td><?= htmlspecialchars($row["colector"]) ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>

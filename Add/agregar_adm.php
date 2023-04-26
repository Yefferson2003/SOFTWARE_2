<?php

require_once('../Conexión/Conn.php');
//conexión a la base de datos
$conn =  conectarBD();

// Obtener los datos del formulario
$id_cedula = $_POST['id_cedula_adm'];
$nombre = $_POST['nombre_adm'];
$contrasena = $_POST['contrasena_adm'];

// Insertar los datos en la tabla "Adm"
$query = "INSERT INTO Adm (Id_Cedula, Nombre, Contrasena) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "sss", $id_cedula, $nombre, $contrasena);
$result = mysqli_stmt_execute($stmt);

// Verificar el resultado de la inserción
if ($result) {
    echo "<script>alert('Alerta: Nuevo administrador agregado exitosamente.'); window.location.href = '../Menu/Menu_Adm.html';</script>";
} else {
    echo "<script>alert('Alerta: Error al agregar el nuevo administrador.'); window.location.href = '../Menu/Menu_Adm.html';</script>". mysqli_error($conn);
}

// Cerrar la conexión
mysqli_close($conn);

?>
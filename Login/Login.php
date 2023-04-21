<?php

require_once('../Conexión/Conn.php');
//conexión a la base de datos
$conn =  conectarBD();


//datos para el login
$cedula = $_POST["L_ID"];
$contrasena = $_POST["L_Contraseña"];

// Consulta SQL para buscar en la tabla Adm
$sql = "SELECT * FROM Adm WHERE Id_Cedula='$cedula' AND Contrasena='$contrasena'";
$resultado = $conn->query($sql);

// Si se encuentra en la tabla adm, iniciar sesión
if ($resultado->num_rows > 0) {
    header('Location: ../Menu/Menu_Adm.html');
} else {
    // Si no se encuentra en la tabla adm, buscar en la tabla operario
    $sql = "SELECT * FROM Operario WHERE Id_Cedula='$cedula' AND Contrasena='$contrasena'";
    $resultado = $conn->query($sql);

    // Si se encuentra en la tabla operario, iniciar sesión
    if ($resultado->num_rows > 0) {
        header('Location: ../Menu/Menu_User.html');
    } else {
        // Si no se encuentra en ninguna de las dos tablas, mostrar mensaje de error
        echo "<script>alert('Error: Identificación de usuario incorrecta'); window.location.href = 'Login.html';</script>";
    }
}

// Cerrar la conexión con la base de datos
$conn->close();

?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configuración del correo
    $to = "fanaac.proyectos.contacto@gmail.com";
    $subject = "Nuevo mensaje desde la web FAAAC";
    
    // Datos del formulario
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));
    
    // Validar campos
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Correo electrónico no válido.";
        exit;
    }
    
    // Construir el contenido del correo
    $emailContent = "Has recibido un nuevo mensaje desde el formulario de contacto:\n\n";
    $emailContent .= "Nombre: $name\n";
    $emailContent .= "Correo: $email\n";
    $emailContent .= "Mensaje:\n$message\n";
    
    // Encabezados del correo
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Enviar el correo
    if (mail($to, $subject, $emailContent, $headers)) {
        echo "Mensaje enviado con éxito.";
    } else {
        echo "Hubo un error al enviar el mensaje. Por favor, inténtelo de nuevo.";
    }
} else {
    echo "Método no permitido.";
}
?>

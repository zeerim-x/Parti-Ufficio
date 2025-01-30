<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ottieni i dati dal form con validazione base
    $name = htmlspecialchars($_POST['name'] ?? '');
    $surname = htmlspecialchars($_POST['surname'] ?? '');
    $phone = htmlspecialchars($_POST['phone'] ?? '');
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $address = htmlspecialchars($_POST['address'] ?? '');
    $city = htmlspecialchars($_POST['city'] ?? '');
    $province = htmlspecialchars($_POST['province'] ?? '');
    $cap = htmlspecialchars($_POST['cap'] ?? '');
    $country = htmlspecialchars($_POST['country'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    // Validazione email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Indirizzo email non valido.";
        exit;
    }

    // Destinatario
    $to = "ciro.bianco1889@gmail.com";

    // Oggetto dell'email
    $subject = "Nuovo messaggio dal form di contatto";

    // Corpo del messaggio
    $body = "Nome: $name\n";
    $body .= "Cognome: $surname\n";
    $body .= "Telefono: $phone\n";
    $body .= "Email: $email\n";
    $body .= "Indirizzo: $address\n";
    $body .= "Città: $city\n";
    $body .= "Provincia: $province\n";
    $body .= "CAP: $cap\n";
    $body .= "Stato: $country\n\n";
    $body .= "Messaggio:\n$message";

    // Headers email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Invia l'email
    if (mail($to, $subject, $body, $headers)) {
        echo "Messaggio inviato con successo.";
    } else {
        echo "Si è verificato un errore durante l'invio del messaggio.";
    }
} else {
    echo "Accesso non autorizzato.";
}
?>
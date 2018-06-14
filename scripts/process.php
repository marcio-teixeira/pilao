<?php

require(__DIR__) . '/dbQuery.php';
require(__DIR__) . '/functions.php';
require(__DIR__) . '/../inc/globals.php';
require(__DIR__) . '/../vendor/autoload.php';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$cnpj = $_POST['cnpj'];
$nome = $_POST['nome'];
$email = $_POST['email'];

if (!validar_cnpj($cnpj)) {
    header('Location: ' . url_path() . 'error.php?msg=cnpj-invalido');
    exit;
}

$clear_cnpj = str_replace(array('.', '/', '-'), '', $cnpj);//limpa a máscara
$ini_cnpj = substr($clear_cnpj, 0, -6); // inicio do cnpj - para verificar filiais

$query = $conn->prepare("SELECT * FROM franquias WHERE cnpj LIKE :cnpj");
$query->execute(array(
    ':cnpj' => $ini_cnpj . '%'
));
$franquias = $query->fetchAll();

if (!$franquias) {
    header('Location: ' . url_path() . 'error.php?msg=cnpj-nao-encontrado');
    exit;
} else {
    foreach ($franquias as $franquia) {
        if ($franquia['participando'] == 1) {
            header('Location: ' . url_path() . 'error.php?msg=ja-participa');
            exit;
        }
        $query = $conn->prepare("UPDATE franquias SET nome = :nome, email = :email, participando = :participando, dt_cadastro = :dt_cadastro WHERE id LIKE :id");
        $query->execute(array(
            ':id' => $franquia['id'],
            ':nome' => $nome,
            ':email' => $email,
            ':participando' => 1,
            ':dt_cadastro' => date('Y-m-d H:i:s')
        ));
    }
    $subject = 'Pilão Professional - Campanha de Incentivo PDV';
    $to = $email;
    $from = 'smtpdezoito@gmail.com';
    $file = 'email-template.php';

    $mail = new PHPMailer(true);
    
    try {
        $mail->SMTPDebug = 0; // Enable verbose debug output 0 1 ou 2
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';// Specify main and backup SMTP servers
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'smtpdezoito@gmail.com';// SMTP username
        $mail->Password = 'cliente@3409'; // SMTP password
        $mail->SMTPSecure = 'TSL';// Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587; // TCP port to connect to
        $mail->CharSet = 'UTF-8';
        //Recipients
        $mail->setFrom($from, 'Pilão Professional');
        $mail->addAddress($to, $nome);// Add a recipient
        //$mail->addAddress('ellen@example.com');// Name is optional
        //$mail->addReplyTo($email, $nome);
        $mail->addBCC('rsdezoito.emails@gmail.com');//$mail->addCC('cc@example.com');
        
        //Content
        $mail->isHTML(true);// Set email format to HTML
        $mail->Subject = $subject;
        $message = file_get_contents(dirname(__FILE__) . '/' . $file);
        $message = str_replace("{{nome}}", $nome, $message);

        $mail->MsgHTML($message);

        $mail->send();
    } catch (Exception $e) {
        echo 'Ocorreu um erro no envio de sua mensagem. ' .  $mail->ErrorInfo;
        exit;
    }
}


//CNPJs com mais de 1 franquia
//17576834000223
//17576834000576

//61585816000119
//61585816000208

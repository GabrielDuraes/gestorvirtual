<?php
header('Content-type: text/plain; charset=utf-8');

include('phpMailer/PHPMailerAutoload.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

//enviando por email
$mail = new PHPMailer();

// Define os dados do servidor e tipo de conexão
$mail->SMTPDebug = 0;
$mail->IsSMTP(); // Define que a mensagem serÃ¡ SMTP
$mail->Host = "smtp.ufvjm.edu.br"; // EndereÃ§o do servidor SMTP (caso queira utilizar a autenticaÃ§Ã£o, utilize o host smtp.seudomÃ­nio.com.br)
$mail->SMTPAuth = true; // Usar autenticaÃ§Ã£o SMTP (obrigatÃ³rio para smtp.seudomÃ­nio.com.br)
$mail->Username = 'sistema.dasa@ufvjm.edu.br'; // UsuÃ¡rio do servidor SMTP (endereÃ§o de email)
$mail->Password = 'D@SA_sis#144#'; // Senha do servidor SMTP (senha do email usado)
// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->From = "sistema.dasa@ufvjm.edu.br"; // Seu e-mail
$mail->Sender = "sistema.dasa@ufvjm.edu.br"; // Seu e-mail
$mail->FromName = mb_encode_mimeheader("Contato: Gestor Virtual", "UTF-8"); // Seu nome
// Define os destinatÃ¡rio(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->AddAddress('gestorvirtualapp@gmail.com', 'Gestor Virtual');
//$mail->AddAddress($email_solicitante, $nome_solicitante);
//$mail->AddBCC($email_profissional, $servidor_saude); // Copia
// $mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // CÃ³pia Oculta
// Define os dados tÃ©cnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail serÃ¡ enviado como HTML
//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->Subject  = mb_encode_mimeheader("Contato: Gestor Virtual","UTF-8"); // Assunto da mensagem
$mail->Body = '
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<title>Untitled Document</title>
</head>
<body>

<div style="width:100%; height: 100vh;" align="center">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top" >
        <table width="600" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20" align="left" valign="top" style="background-color:#25B4C4;">&nbsp;</td>
            <td align="center" valign="top" style="background-color:#25B4C4; font-family: Roboto, sans-serif; font-size:14px;"><br>
              <br>
            <br>
            <div style="color:#ddd; font-family: Roboto, sans-serif; font-size:16px; text-align: center;">
            <b style="font-size: 20px;">Formulario de Contato do Gestor Virtual</b><br><br>
            <img src="https://scontent.fbsb9-1.fna.fbcdn.net/v/t1.0-9/27540804_147860685924843_7538457134362221074_n.jpg?oh=be05c38eb6ea26dc14767bdfcc3057da&oe=5B1A948C" width="20%" height="auto" style="display:block;margin-right:auto;margin-left:auto"><br><br>
							
							<b style="font-size: 20px;">Informações:</b><br><br>
              
              Nome: <strong>'.$nome.'</strong><br><br>
              Email: <strong>'.$email.'</strong><br><br>
              Mensagem: <strong>'.$mensagem.'</strong><br><br><br>

            </div>
            <br>
            <br>
            <br>
            <div style="color:#ddd; font-family: Roboto, sans-serif; font-size:14px;"><!-- <b>Contato</b> <br> -->
             Copyright &copy; 2018 Gestor Virtual, Todos os Direitos Reservados
            <br>
            <br>
            <br>
            <br>
            <br>
            </div>
            </td>
            <td width="20" align="left" valign="top" style="background-color:#25B4C4;">&nbsp;</td>
          </tr>
        </table>
    </td>
  </tr>
</table>

</div>

</body>
</html>
';

$mail->CharSet = 'UTF-8';

// Envia o e-mail
$enviado = $mail->Send();
// Limpa os destinatÃ¡rios e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();
$result = "";

echo json_encode($res);

//  }
header('Location: ../');
?>
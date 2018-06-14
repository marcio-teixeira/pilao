<?php
//-----------------------------------------------------------------------------
// Agencia RS
// http://agenciars.com.br
// Charset UTF-8
//-----------------------------------------------------------------------------

//-----------------------------------------------------------------------------
// CONSTANTS
//-----------------------------------------------------------------------------
$PROTOCOL 	= (($_SERVER['SERVER_PORT'] == 443) ? 'https://' : 'http://');


// lOCAL

//$HOST_NAME 	= 'www.pilaoprofessional.com.br/acao-pdv';
$HOST_NAME 	= 'localhost/pilao/promocao/pilao-acao-pdv';
//$HOST_NAME 	= 'www.rsvision.com.br/clientes/gail';
$FILE_NAME 		= basename($_SERVER['PHP_SELF']);
$DEV 		= '/';
$CONTATOR = 5;
function url_path(){return ($GLOBALS['PROTOCOL'] . $GLOBALS['HOST_NAME'] . $GLOBALS['DEV']);}
?>
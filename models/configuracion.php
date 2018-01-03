<?php
session_start();
if ($_SERVER['SERVER_NAME'] == 'localhost') {
	$servidor = 'localhost';
	$usuariobd = 'root';
	$clavebd = '';
	$bd = 'tianguis';
} else {
	$servidor = 'localhost';
	$usuariobd = 'c0260330_tiangui';
	$clavebd = 'LUri07geze';
	$bd = 'c0260330_tiangui';
}

?>
<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->result->parameters->text;

		$mysqli = new mysqli("mysql5005.smarterasp.net", "9f5ddc_chkbot", "Checkbot3");
		if ($mysqli->connect_errno) {
		    /*echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;*/
		    $resultado = "error al conectar";
		}
		else{
			$resultado = "conectado";
		}

	switch ($text) {
		case 'hoteles':

			$mysqli->query("INSERT INTO USUARIOS VALUES (NULL,'PRUEBA','123','ME','20170928', 'ME','20170928',1)");
				   			

				$speech = $resultado;

			break;

		case 'lugares':
			$speech = "Aqui va un listado de lugares";
			break;

		case 'ayuda':
			$speech = "Aqui la ayuda";
			break;
		
		default:
			$speech = "Perdón, no entendi esto. Pregunta sobre algo más";
			break;
	}

	$response = new \stdClass();
	$response->speech = $speech;
	$response->displayText = $speech;
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->result->parameters->text;

	switch ($text) {

		case 'hoteles':

		$speech = "Actualmente tenemos los siguientes hoteles: 1. Posada de fidel";

			break;
		

		case 'lugares':
			$speech = "Tengo hoteles en: 1. San Pedro Pinula, Jalapa";
			break;

		case 'ayuda':
			$speech = "Ingresa el nombre de un hotel o lugar. Por ejemplo: Jalapa, Posada de Fidel";
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
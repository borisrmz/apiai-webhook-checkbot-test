<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->result->parameters->text;

	switch ($text) {

		case 'hoteles':

		$speech = "Estos son los hoteles";

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
	echo json_encode($response);
	
	
}
else
{
	echo "Method not allowed";
}

?>
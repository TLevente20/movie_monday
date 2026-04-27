<?php
require_once __DIR__ . '/../service/MovieService.php';

class MovieController{

    static function getAllMovie(){
        $serviceResult = MovieService::getAllMovie();

        http_response_code($serviceResult['statusCode']);

        if ($serviceResult['success']){
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($serviceResult['result']);
        }else{
            header('Content-Type: text/plain; charset=utf-8');
            echo $serviceResult['result'];
        }

    }
}

$requestMethod = $_SERVER['REQUEST_METHOD'];

switch($requestMethod){
    
    case 'GET': 
        MovieController::getAllMovie();
        break;

    default:
        http_response_code(405);
        header('Content-Type: text/plain; charset=utf-8');
        echo 'Request method is not allowed!';
        
}
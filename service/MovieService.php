<?php
require_once __DIR__ . '/../model/Movie.php';

class MovieService{

    static function getAllMovie(){
        $modelResult = Movie::getAllMovie();

        if(!$modelResult['success']){
            return [
                'success' => false,
                'statusCode' => 500,
                'result' => $modelResult['result']
            ];
        }

        $moviesWithFormatedDuration = [];

        foreach($modelResult['result'] as $movie){

            $hours = floor($movie['duration'] / 60);
            $minutes = $movie['duration'] % 60;

            $formatedDuration = "$hours:$minutes";
            
            $movie['duration'] = $formatedDuration;
            $moviesWithFormatedDuration[] = $movie;
        }
        
    }
}
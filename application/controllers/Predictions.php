<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Predictions extends CI_Controller{
    public function showAllprediction(){
        require_once APPPATH.'vendor/autoload.php';
		$response = Unirest\Request::get("https://football-prediction-api.p.rapidapi.com/api/v1/predictions",
		  array(
			"X-RapidAPI-Host" => "football-prediction-api.p.rapidapi.com",
			"X-RapidAPI-Key" => "99abb8a81fmshce10ae038fe1cbap10286djsnedc668d8d1a0"
		  )
		);
		$allteams=$response->raw_body;
		
        
       
		
		$json =json_decode($allteams);
		foreach ($json as  $data) {
			foreach ($data as $value) {
				echo "Federation:".$value->federation."<br>";
				echo "Competition Cluster:".$value->competition_cluster."<br>";
				echo "Season:".$value->season."<br>";
				echo "Date:".$value->start_date."<br>";
				echo $value->home_team."-".$value->away_team."<br>";
				echo "prediction=".$value->prediction."<br>";
				echo "status=".$value->status."<br>";
				echo "competition name=".$value->competition_name."<br>";
				echo "Result=".$value->result."<br>";	
				foreach ($value->odds as  $key =>$value4) {
					echo "Odds:<br>".$key."=".round($value4, 2)."<br>";	
				}
				
				echo "=================<br>";
			}
		}
    }
}
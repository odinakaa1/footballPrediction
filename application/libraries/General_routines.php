<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General_routines {
        public function showAllprediction(){
                $response = Unirest\Request::get("https://football-prediction-api.p.rapidapi.com/api/v2/predictions?iso_date=2018-12-01&market=classic&federation=UEFA",
                array(
                "X-RapidAPI-Host" => "football-prediction-api.p.rapidapi.com",
                "X-RapidAPI-Key" => "99abb8a81fmshce10ae038fe1cbap10286djsnedc668d8d1a0"
                )
                );
                $allteams=$response->raw_body;
                // print_r($allteams);
                $json =json_decode($allteams);
                $i= 0;
                foreach ($json as  $data) {
                        foreach ($data as $value) {   
                                while($i<10){
                                        echo ' <div class="prediction-summary">
                                        <div class="prediction-team-title">'.$value->start_date.'
                                       </div>
                                         
                                        <label class="prediction-team-details">'.$value->home_team.' - '.$value->away_team.'</label><br>
                                        <a href>  <button type="button" class="btn btn-primary btn-sm">
                                        Prediction <span class="badge badge-light"><strong>'.$value->prediction.'</strong></span>
                                        </button>   
                                        </a>
                                        <br><br>

                                       
                                        <div class="spacer">
                                        <a href>  <button type="button" class="btn btn-dark btn-sm">
                                        Game Venue: <span class="badge badge-light"><strong>'.$value->competition_cluster.'</strong></span>
                                        </button>
                                        </a>
                                        </div>

                                       <div class="spacer">
                                        <a href>  <button type="button" class="btn btn-dark btn-sm">
                                        Season <span class="badge badge-light"><strong>'.$value->season.'</strong></span>
                                        </button
                                        </a>
                                       </div>
                                        
                                       <div class="spacer">
                                        <a href>  <button type="button" class="btn btn-dark btn-sm">
                                        Federation <span class="badge badge-light"><strong>'.$value->federation.'</strong></span>
                                        
                                        </button></a>
                                        </div>

                                        <div class="spacer ">
                                        <a href>  <button type="button" class="btn btn-dark btn-sm">
                                        Competition <span class="badge badge-light"><strong>'.$value->competition_name.'</strong></span>
                                       
                                        </button>  </a>
                                        </div>';
                                        foreach ($value->odds as  $key =>$value4) {
                                        echo   '<span>  <button type="button" class="btn btn-primary btn-sm odds" >
                                        '.$key.' <span class="badge badge-light"><strong>'.round($value4, 2).'</strong></span>
                                        </button>   
                                        </span>';
                                                }
                                        echo '<div>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                                                More Details
                                                </button>
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                                <div class="modal-body">
                                                        '.$value->status.'
                                                </div>
                                                <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                </div>
                                                </div>
                                                </div>
                                        </div>
                                </div>  
                                        </div>'; 
                                $i++;
                                } 
                                        
                               
                                        
                        }     
                }
        }
}

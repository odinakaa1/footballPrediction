<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General_routines {
        public function showAllprediction(){
                $response = Unirest\Request::get("https://football-prediction-api.p.rapidapi.com/api/v1/predictions",
                array(
                "X-RapidAPI-Host" => "football-prediction-api.p.rapidapi.com",
                "X-RapidAPI-Key" => "13be0ba558mshcb18ea29daf2b3dp1793cajsn46b046185d1b"
                )
                );//Rapid api key: 99abb8a81fmshce10ae038fe1cbap10286djsnedc668d8d1a0
                $allteams=$response->raw_body;
                // print_r($allteams);
                // die();
                $json =json_decode($allteams);
                $i= 0;
                foreach ($json as  $data) {
                        
                        foreach ($data as $value) { 
                                $total_strength = $value->home_strength+$value->away_strength;
                                $home_strength = ($value->home_strength/$total_strength)*100;
                                $away_strength = ($value->away_strength/$total_strength)*100;
                                echo ' <div class="prediction-summary">
                                <div class="prediction-team-title">'.$value->start_date.'
                               </div>
                                 
                                <h6 class="prediction-team-details"><bold>'.$value->home_team.' - '.$value->away_team.'</h6>
                                <a href>  <button type="button" class="btn btn-primary btn-sm">
                                Prediction <span class="badge badge-light"><strong>'.$value->prediction.'</strong></span>
                                </button>   
                                </a>
                                <span class="dropdown dropleft">
                                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        ...
                                        </a>
                              
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="">Status: '.$value->status.'</a>
                                                <a class="dropdown-item" href="#">Home Strength: '.round($home_strength, 2).'%</a>
                                                <a class="dropdown-item" href="#">Away Strength: '.round($away_strength, 2).'%</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="'.$value->id.'">This match other predictions</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">All prediction Performance </a>

                                        </div>
                                </span>
                                <br><br>

                               
                                <div class="spacer">
                                <a href>  <button type="button" class="btn btn-dark btn-sm">
                                Match Venue <span class="badge badge-light"><strong>'.$value->competition_cluster.'</strong></span>
                                </button>
                                </a>
                                </div>

                               <div class="spacer" >
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
                                </div><h6>Odds<h6>';

                                foreach ($value->odds as  $key =>$value4) {
                                echo   '<span>  <button type="button" class="btn btn-primary btn-sm odds" >
                                '.$key.' <span class="badge badge-light"><strong>'.round($value4, 2).'</strong></span>
                                </button>   
                                </span>'; 
                                        }

                                
                                echo '<label>Propabilities<label>';
                                foreach ($value->probabilities as  $probabilitiesKey =>$propability) {
                                        $roundOff= round($propability, 2)*100;
                                echo   '<span>  <button type="button" class="btn btn-primary btn-sm odds" >
                                '.$probabilitiesKey.' <span class="badge badge-light"><strong>'.$roundOff.'%</strong></span>
                                </button>   
                                </span>';
                                        }
                                echo '<hr>
                                        <div id="moreInfo"><button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModalLong">
                                        <i class="fa fa-road" aria-hidden="true"></i><small>Km Apart: </small>'.$value->distance_between_teams.'
                                        </button>
                                        <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModalLong">
                                        <i class="fa fa-arrows" aria-hidden="true"></i><small>Pitch: </small> '.$value->field_width.'X'.$value->field_length.'
                                        </button>
                                        </div>
                                        <div id="moreInfo"><button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModalLong">
                                        <i class="fa fa-users" aria-hidden="true"></i><small>Capacity</small>: '.$value->stadium_capacity.'
                                        </button>
                                        <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModalLong">
                                        <i class="fa fa-futbol-o" aria-hidden="true"></i>
                                        Status: '.$value->status.'
                                        </button>
                                        </div>
                                
                                </div>  
                                </div>';
                                $i++;
                                if($i>5){
                                        break;
                                }
                                        
                                
                                        
                               
                                        
                        }     
                }
        }
}

       
     
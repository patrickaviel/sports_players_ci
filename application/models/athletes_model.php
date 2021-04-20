<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class athletes_model extends CI_Model {

    function get_all_sports(){
        // Query for getting all of the athletes from the database and return as an array
        $query = "SELECT * FROM sports";
        return $this->db->query($query)->result_array();
    }

    function get_all_athletes(){
        // Query for getting all of the athletes from the database and return as an array
        $query = "SELECT athletes.id, CONCAT(athletes.first_name,' ',athletes.last_name) AS name, athletes.gender, athletes.picture FROM athletes";  
        return $this->db->query($query)->result_array();
    }

    function search($genders,$player_name,$sports){
        // Selecting records
        $this->db->select("athletes.id, CONCAT(athletes.first_name,' ',athletes.last_name) AS name, athletes.gender, sports.sport, athletes.picture");
        // from table 'athletes'
        $this->db->from('athletes');
        // INNER JOIN
        $this->db->join('athletes_sports', 'athletes.id = athletes_sports.athlete_id', 'inner');
        $this->db->join('sports', ' athletes_sports.sport_id = sports.id', 'inner');
        // Convert array to string if not null
        if(!is_null($genders)){
            $gender = implode(",",$genders);
            $this->db->where_in('gender', $gender);
        }
        // Convert array to string if not null
        if(!is_null($sports)){
            $sports = implode(",",$sports);
            $this->db->where_in('sports.sport', $sports);
        }
        // Convert array to string if not null
        if(!is_null($player_name)){
            $this->db->like("CONCAT(athletes.first_name,' ',athletes.last_name)", $player_name);
        }
        // storing the whole query to the variable query
        $query = $this->db->get_compiled_select();
        // execute and return the query
        return $this->db->query($query)->result_array();
    }
     // $query = "SELECT athletes.id, CONCAT(athletes.first_name,' ',athletes.last_name) AS name, athletes.gender, sports.sport, athletes.picture FROM athletes 
        //             INNER JOIN athletes_sports ON athletes.id = athletes_sports.athlete_id
        //             INNER JOIN sports ON athletes_sports.sport_id = sports.id";

}
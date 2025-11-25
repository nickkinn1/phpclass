<?php

namespace App\Models;

use CodeIgniter\Model;

class Race extends Model
{
    public function get_races() : array
    {
        $db = db_connect();
        $query = "SELECT * FROM races";
        $result = $db->query($query);
        return $result->getResultArray();
    }

    public function get_race($id)
    {
        $db = db_connect();
        $query = "SELECT * FROM races WHERE raceID = ?";
        $result = $db->query($query, [ $id ]);
        return $result->getResultArray()[0];
    }

    public function add_race($raceName, $raceDesc, $raceLocation, $raceDateTime) : void
    {
        $db = db_connect();
        $query = "INSERT INTO races(raceName, raceDesc, raceLocation, raceDateTime) VALUES(?,?,?,?)";
        $db->query($query, [ $raceName, $raceDesc, $raceLocation, $raceDateTime ]);
    }

    public function delete_race($id) : void
    {
        $db = db_connect();
        $query = "DELETE FROM races WHERE raceID = ?";
        $db->query($query, [ $id ]);
    }

    public function update_race($id, $raceName, $raceDesc, $raceLocation, $raceDateTime)
    {
        $db = db_connect();
        $query = "UPDATE races SET raceName = ?, raceDesc = ?, raceLocation = ?, raceDateTime = ? WHERE raceID = ?";
        $db->query($query, [ $raceName, $raceDesc, $raceLocation, $raceDateTime, $id ]);
    }
}
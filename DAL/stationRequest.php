<?php
/**
 * Created by PhpStorm.
 * User: lucien
 * Date: 28.09.2017
 * Time: 09:51
 * this class allows you to do request about the station on the DB
 */
require_once 'mySQLConnection.php';
require_once '../DTO/station.php';

//a class containing the request concerning a station
class StationRequest
{
    private $_dbh;
    public function __construct()
    {
        try{
            $this->_dbh = MySQLConn::getConn();

        }catch (PDOException $e){
            die('Connection failed/Connexion échouée/Verbindung fehlgeschlagen:'.$e->getMessage());
        }
    }

    public function insertStation($stationName, $regionId){
        //The query for inserting a new station

        if(empty($this->getStationByNameAndRegionId($stationName, $regionId))) {
            try {
                $sth = $this->_dbh->prepare("INSERT INTO station (name, region_id) VALUES (:name, :region_id)");
                $sth->bindParam(':name', $stationName);
                $sth->bindParam(':region_id', $regionId);
                if ($sth->execute()) {

                } else {
                    echo "Add Failed/Ajout échoué/Hinzufügen fehlgeschlagen!";
                }
            } catch (PDOException $e) {
                die('Connection failed/Connexion échouée/Verbindung fehlgeschlagen:' . $e->getMessage());
            }
        }
    }
    public function deleteStation($stationId){
        //The query for removing a station
        try{
            $sth = $this->_dbh->prepare("DELETE FROM station WHERE _id = :stationId");
            $sth->bindParam(':stationId', $stationId);

            if ($sth->execute()) {

            } else {
                echo "Failed Deletion/Suppresion échouée/Fehlgeschlagene Löschung!";
            }
        } catch (PDOException $e) {
            die('Connection failed/Connexion échouée/Verbindung fehlgeschlagen:' . $e->getMessage());
        }
    }
    public function getStationByNameAndRegionId($stationName, $regionId){
        //The query for getting one station by its name and region
        $regionId = intval($regionId);
        $stationName = str_replace("'", "\'", $stationName);
        $query = "SELECT _id, name, region_id FROM station WHERE name = '$stationName' AND region_id = $regionId";

        $result = $this->_dbh->query($query);
        $returnedStations = null;
        while ($row = $result->fetch()) {
            $returnedStations= new Station($row['_id'], $row['name'], $row['region_id']);
        }
        return $returnedStations;
    }
    public function getStationByName($stationName){
        //The query for getting one station by its name
        $stationName = str_replace("'", "\'", $stationName);
        $query = "SELECT _id, name, region_id FROM station WHERE name = '$stationName'";

        $result = $this->_dbh->query($query);
        $returnedStations = null;
        while ($row = $result->fetch()) {
            $returnedStations= new Station($row['_id'], $row['name'], $row['region_id']);
        }
        return $returnedStations;
    }
    public function getStationById($stationId){
        //The query for getting one station by its id
        $stationId = intval($stationId);
        $query = "SELECT _id, name, region_id FROM station WHERE name = $stationId";

        $result = $this->_dbh->query($query);
        $returnedStations = null;
        while ($row = $result->fetch()) {
            $returnedStations= new Station($row['_id'], $row['name'], $row['region_id']);
        }
        return $returnedStations;
    }
    public function getStationLikeName($stationName){
        //The query for getting stations corresponding to the entry
        $stationName = str_replace("'", "\'", $stationName);
        $query = "SELECT _id, name, region_id FROM station WHERE name LIKE '$stationName%'";

        $result = $this->_dbh->query($query);
        $returnedStations = array();
        while ($row = $result->fetch()) {
            array_push($returnedStations, new Station($row['_id'], $row['name'], $row['region_id']));
        }
        return $returnedStations;
    }
    public function getAllStationByRegion($regionId){
        //The query for getting all stations of a region
        $regionId = intval($regionId);
        $query = "SELECT _id, name, region_id FROM station WHERE region_id LIKE $regionId";

        $result = $this->_dbh->query($query);
        $returnedStations = array();
        while ($row = $result->fetch()) {
            array_push($returnedStations, new Station($row['_id'], $row['name'], $row['region_id']));
        }
        return $returnedStations;
    }
    public function getAllStations(){
        //The query for getting all stations
        $query = "SELECT _id, name, region_id FROM station";

        $result = $this->_dbh->query($query);
        $returnedStations = array();
        while ($row = $result->fetch()) {
            array_push($returnedStations, new Station($row['_id'], $row['name'], $row['region_id']));
        }
        return $returnedStations;
    }
}
<?php
/********************************
* Competition Class Dependencies
********************************/
// Add Database Connection
    require('../../../__CONNECT/connection.php');
// Add Competitor Class
// Add Team Class
// Add Week Class
// Add Weigh In Class

/***************************** Begin Competition Class *******************************/

class Competition{

/********************************
* Competition Class Properties
********************************/
    
    public $connection;
    public $database    = "recapp_18_03_21_01";
    public $table       = "competitions";
    public $id;
    public $name;
    public $location;
    public $details;

/********************************
* Competition Class Constructor
********************************/

    public function __construct($connection){
        $this->connection = $connection;
        $this->createTable();
    }

/********************************
* Competition Class Methods
********************************/

// Add Competition

    public function addCompetition(array $data){
        $this->setCompetitionData($data);
        $this->insertCompetition();
    }

// Add Competitor
// Add Team
// Add Week
// Add Weigh In
// Competition Recapp
// Create Competitions Table

    public function createTable(){
        $sql = "CREATE TABLE IF NOT EXISTS `".$this->database."`.`".$this->table."` (
        `competition_ID` INT NOT NULL AUTO_INCREMENT ,
        `competition_name` VARCHAR(255) NOT NULL ,
        `competition_location` VARCHAR(255) NOT NULL ,
        `competition_details` TEXT NULL ,
        `competition_date_entered` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
        PRIMARY KEY (`competition_ID`)
        ) ENGINE = InnoDB;";
        
        if($result = $this->processQuery($sql)){
            // echo('Competitions Table Created...');
        }
    }

// Get Competition Data

    public function getCompetitionData($result){

            $row = mysqli_fetch_assoc($result);
            return $competition_name = $row['competition_name'];

    }
    
// Insert Competition

    public function insertCompetition(){

        $sql = "INSERT INTO `".$this->table."`(
            `competition_ID`,
            `competition_name`,
            `competition_location`,
            `competition_details`,
            `competition_date_entered`
          ) values(
            NULL,
            '$this->name',
            '$this->location',
            '$this->details',
            CURRENT_TIMESTAMP
          );";

        if($result = $this->processQuery($sql)){
            echo("<script> alert('".$this->name." Competition Has Been Added...') </script>");
        }

    }

// Process Query

    public function processQuery($sql){
        return mysqli_query($this->connection, $sql);
    }

// Select Competition By Id

    public function getCompetitionByID($id){
        $sql = "SELECT competition_name FROM competitions WHERE competition_ID=$id;";
        if($result = $this->processQuery($sql)){
            return $this->getCompetitionData($result);
        }

        echo('ID #'.$id.' Does not exist...');
    }

// Select Competition ID By Name

    public function getID($name){
        $sql = "SELECT competition_ID FROM competitions WHERE competition_name='$name' LIMIT 1;";
        if($result = $this->processQuery($sql)){

            $row = mysqli_fetch_assoc($result);
            return $id = $row['competition_ID'];
        }

    }

// Select Competitor By Id
// Select Competitor By Name
// Select Team By Id
// Select Team By Name
// Select Week By Id
// Select Week By Name
// Select Weigh In By Competition
// Select Weigh In By Competitor
// Select Weigh In By Id
// Select Weigh In By Team
// Select Weigh In By Week
// Set Competition Data

    public function setCompetitionData(array $data){

        $this->id       = $data['competition_id'];
        $this->name     = $data['competition_name'];
        $this->location = $data['competition_location'];
        $this->details  = $data['competition_details'];

    }

// View Competitions
// View Competitors
// View Teams
// View Team Leaders
// View Weeks
// View Weigh Ins


}
// ***** Test Code *****

$Competition = new Competition($connection);

// $name = 'SC Losing To Live';
// echo $competition_data = $Competition->getID($name);

// $id = 1;
// echo $competition_data = $Competition->getCompetitionByID($id);

?>
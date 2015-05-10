<?php
/**
 * Created by PhpStorm.
 * User: Praveen
 * Date: 5/10/15
 * Time: 12:31 AM
 */

class TopicData {
    //Class content go here
    protected $connection;

    public function connect(){
        $this->connection = new PDO("mysql:host=localhost;dbname=suggestotron", "root", "123");
    }

    public function getAllTopics(){
        $query = $this->connection->prepare("SELECT * FROM topics");
        $query->execute();

        return $query;
    }
}

?>
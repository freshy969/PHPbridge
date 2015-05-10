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

    public function add($data)
    {
        $query = $this->connection->prepare(
            "INSERT INTO topics (
            title,
            description
        ) VALUES (
            :title,
            :description
        )"
        );

        $data = [
            ':title' => $data['title'],
            ':description' => $data['description']
        ];

        $query->execute($data);
    }

    public function __construct()
    {
        $this->connect();
    }

    public function getTopic($id){
        $sql = "SELECT * FROM topics WHERE id = :id LIMIT 1";
        $query = $this->connection->prepare($sql);

        $values = [':id' => $id];
        $query->execute($values);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data){
        $query = $this->connection->prepare(
            "Update topics SET title = :title,
                                description = :description
                            WHERE
                                id= :id"
        );

        $data = [
            ':id' => $data['id'],
            ':title' => $data['title'],
            ':description' => $data['description']
        ];
        return $query->execute($data);
    }

    public function delete($id) {
        $query = $this->connection->prepare(
            "DELETE FROM topics
                    WHERE
                         id = :id"
        );

        $data = [
            ':id' => $id
        ];
        return $query->execute($data);
    }
}

?>
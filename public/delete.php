<?php
require 'TopicData.php';

if (!isset($_GET['id']) || empty($_GET['id']) ){
    echo "You did not pass an ID";
    exit;
}
$data = new TopicData();
$topic = $data->getTopic($_GET['id']);

if ($topic === false) {
    echo "Topic not found";
    exit;
}

if ($data-> delete($_GET['id'])) {
    header("Location: /index.php");
    exit;
} else {
    echo "An Error Occured";
}

?>
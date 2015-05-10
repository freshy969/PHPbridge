<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'TopicData.php';

$data = new TopicData();
$data->connect();

$topics = $data->getAllTopics();

foreach ($topics as $topic) {
    echo "<h3>" .$topic['title']. " (ID: " .$topic['id']. ")</h3>";
    echo "<p>";
    echo nl2br($topic['description']);
    echo "</p>";
    echo "<p>";
    echo "<a href='/edit.php?id=".$topic['id']."'>Edit</a>";
    echo "|";
    echo "<a href='/delete.php?id=".$topic['id']."'>Delete</a>";
    echo "</p>";

}
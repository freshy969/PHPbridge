<?php
require 'TopicData.php';

if (!isset($_GET['id']) || empty($_GET['id'])){
    $data = new TopicData();
    if($data->update($_POST)){
        header("Location: /index.php");
        exit;
    }else {
        echo "An Error Occured";
        exit;
    }
}



$data = new TopicData();
$topic = $data->getTopic($_GET['id']);

if ($topic === false) {
    echo "Topic Not found";
    exit;
}
?>



<h2>Edit Topic <?php $topic['title']; ?></h2>
<form action="edit.php" method="post">
    <label>
        Title: <input type="text" name="title" value="<?=$topic['title']; ?>" />
    </label>
    <br/>
    <label>
        Description:
        <br/>
        <textarea name="description"cols="50" rows="20"><?=$topic['description']; ?></textarea>
    </label>
    <br/>
    <input type="hidden" name="id" value="<?=$topic['id']; ?>">
    <input type="submit" value="Edit Topic">
</form>
<!DOCTYPE html>

<?php
require("adminPanel.php");
require("addPostView.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $body = test_input($_POST["createdPost"]);
    $title = test_input($_POST["title"]);
    $slug = slugify(test_input($_POST["title"]));
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO posts (user_id, title, slug,views,body,published) VALUES ('$user_id', '$title', '$slug',0,'$body',1)";
    $result = mysqli_query($conn,$query);

    $query = "SELECT * FROM posts ORDER BY ID DESC LIMIT 1";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    $post_id = $row['id'];
    
    $query = "SELECT * FROM post_type WHERE name ='" . $_POST["contentSection"] ."'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    $topic_id = $row['id'];

    $query = "INSERT INTO post_topic_relationship (post_id,topic_id) VALUES ('$post_id ', '$topic_id')";
    $result = mysqli_query($conn,$query);

}else{

    $query = "SELECT * FROM users WHERE email ='". $_SESSION['mail'] ."'";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['user_id'] = $row["id"];
    }
}


?>

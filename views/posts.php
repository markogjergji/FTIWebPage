<?php 
    include("head.php");

    $query = "SELECT * FROM posts WHERE id IN
        (SELECT post_id FROM post_topic_relationship WHERE topic_id= (SELECT id FROM post_type WHERE slug ='". $_GET['slug'] ."')) ORDER BY ID DESC";
       // $query = "SELECT post_id FROM post_topic_relationship WHERE topic_id= (SELECT id FROM post_type WHERE slug ='". $_GET['slug'] ."')";

    
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)){
  
        

        $sql = "SELECT * FROM users WHERE id ='" . $row["user_id"] ."'";
        $res = mysqli_query($conn,$sql); 
        $r = mysqli_fetch_array($res);
        echo "
        <div class='multiple-posts'>
            <a class='title' href='openPost.php?id=". $row['id'] ."'>". $row['title'] . "</a>
            <p class='author'> Autori: ". $r['name'] . "&nbsp&nbsp&nbsp&nbsp Publikuar ne: ".$row['created_at']."</p>

        </div>
            
        "; 

    }

    include("footer.php");

?>
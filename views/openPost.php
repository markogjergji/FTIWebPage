<?php 

    include("head.php");

    $query = "SELECT * FROM posts WHERE id ='" . $_GET["id"] . "'";
       
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
  
    
    $sql = "SELECT * FROM users WHERE id ='" . $row["user_id"] ."'";
    $res = mysqli_query($conn,$sql); 
    $r = mysqli_fetch_array($res);
    echo "
    <div class='post-container'>
        <p class='title'>". $row['title'] . "</p>
        <p class='author'> Autori: ". $r['name'] . "&nbsp&nbsp&nbsp&nbsp Publikuar ne: ".$row['created_at']."</p>
        <p class='post-body'>". htmlspecialchars_decode($row['body']) . "</p>
    </div>
        
    "; 

    include("footer.php");

?>
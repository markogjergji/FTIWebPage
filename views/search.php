<?php 
    include('head.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["search-string"])) {
            header("Location: mainPage.php");
        }
        
        
        $query = "SELECT * FROM posts WHERE title LIKE '%" . $_POST['search-string'] ."%' OR body LIKE '%" . $_POST['search-string'] . "%' ORDER BY id DESC";
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
    }
?>
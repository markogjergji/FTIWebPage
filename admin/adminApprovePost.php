<!DOCTYPE html>
<?php
    include("adminPanel.php");
    
    $query = "SELECT * FROM posts WHERE published ='0'";

    $total_reg = "10";

    if(isset($_GET['page'])){
        $page=$_GET['page'];
        
        if (!isset($page)) {
            $pc = 1;
        }
        else{
            $pc = $page;
        }

        $begin = $pc - 1;
        $begin = $begin * $total_reg;

        $limit = mysqli_query($conn,"$query LIMIT $begin,$total_reg");
        $all = mysqli_query($conn,"$query");

        $tr = mysqli_num_rows($all);
        $tp = $tr / $total_reg;

        while ($data = mysqli_fetch_array($limit)) {
            $query = "SELECT * FROM users WHERE id ='" . $data["user_id"] ."'";
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_array($result);
            $name = $data["title"];
            echo "<p id='post'>Posted By:". $row['name']. "Title:". $name."</p><a href='?view=True&post_id=".$data['id']."'><i class='fas fa-eye'></i></a><a href='?approve=True&post_id=".$data['id']."'><i class='fas fa-thumbs-up'></i></a>";

        }

        $previous = $pc -1;
        $next = $pc +1;
        if ($pc>1) {
            echo " <a href='?page=$previous'><-".$previous."</a> ";
        }
            echo "|";
        if ($pc<$tp) {
            echo " <a href='?page=$next'>".$next."-></a>";
        }

    }
    elseif(isset($_GET['view']) and isset($_GET['post_id'])){
        
        $query = "SELECT * FROM posts WHERE id ='" . $_GET['post_id'] ."'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($result);
        $sql = "SELECT * FROM post_type WHERE id=
			(SELECT topic_id FROM post_topic_relationship WHERE post_id='".$_GET['post_id'] ."') LIMIT 1";
        $result = mysqli_query($conn,$sql);
        $tpRow = mysqli_fetch_array($result);
        $query = "SELECT * FROM users WHERE id ='" . $row["user_id"] ."'";
        $result = mysqli_query($conn,$query); 
        $r = mysqli_fetch_array($result);
        echo "
        <div    id='view-container'>
            <p class='title'> ". $row['title'] . "</p>
            <p class='author'> ". $r['name'] . "</p>
            <p class='topic'> ". $tpRow['name'] ."</p>
            <p class='post-body'> = ". htmlspecialchars_decode($row['body']) . "</p>;
            <a href='?approve=True&post_id=".$row['id']."'><i class='fas fa-thumbs-up'></i></a>
        </div>
            
        ";
    }
    elseif(isset($_GET['approve']) and isset($_GET['post_id'])){
        
        $query = "UPDATE posts SET published='1' WHERE id = '" . $_GET['post_id'] . "'";
        $result = mysqli_query($conn,$query);

        header("Location: adminApprovePost.php?page=1");
    }

?>
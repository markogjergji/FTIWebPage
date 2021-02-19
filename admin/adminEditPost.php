<!DOCTYPE html>
<?php
    include("adminPanel.php");
    
    $query = "SELECT * FROM posts";

    $total_reg = "10";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty($_POST["createdPost"])) {
            $bodyErr = "Can't submit empty post";
        }
        else{
            
            $body = test_input($_POST["createdPost"]);
            $title = test_input($_POST["title"]);
            $slug = slugify(test_input($_POST["title"]));
            $date = date('Y-m-d H:i:s');
            $id = $_SESSION['post_id'];
            
            $query = "UPDATE posts SET title ='". $title . "' , slug = '" . $slug . "', body = '" . $body . "', updated_at = '" . $date . "' WHERE id = '" . $id . "'";
            
            
            $result = mysqli_query($conn,$query);
            
            $query = "SELECT * FROM post_type WHERE name ='" . $_POST["contentSection"] ."'";
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_array($result);
            $topic_id = $row['id'];
            
            $query = "UPDATE post_topic_relationship SET topic_id = '" . $topic_id . "'  WHERE post_id = '" . $id ."'";
            $result = mysqli_query($conn,$query);
            
            unset($_SESSION['post_id']);
            echo "<script> window.location.replace('adminDashboard.php') </script>";

        }
    }

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
            echo "<p id='post'>Posted By:". $row['name']. "Title:". $name."</p><a href='?edit=True&post_id=".$data['id']."'><i class='fas fa-edit'></i></a><a href='?delete=True&post_id=".$data['id']."'><i class='fas fa-trash-alt'></i></a>";

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
    elseif(isset($_GET['edit']) and isset($_GET['post_id'])){
        include("addPostView.php");
        $_SESSION['post_id'] = $_GET['post_id'];
        $query = "SELECT * FROM posts WHERE id ='" . $_GET['post_id'] ."'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($result);
        $sql = "SELECT * FROM post_type WHERE id=
			(SELECT topic_id FROM post_topic_relationship WHERE post_id='".$_GET['post_id'] ."') LIMIT 1";
        $result = mysqli_query($conn,$sql);
        $tpRow = mysqli_fetch_array($result);
        echo "<script>
            document.getElementById('contentSection').value = '". $tpRow['name'] ."';
            document.getElementById('mytextarea').value = '". htmlspecialchars_decode($row['body']) . "';
            document.getElementById('title').value = '". $row['title'] . "';
            
        </script>";
    }
    elseif(isset($_GET['delete']) and isset($_GET['post_id'])){
        
        $query = "DELETE FROM posts WHERE id='" . $_GET['post_id'] . "'";
        $result = mysqli_query($conn,$query);

        header("Location: adminEditPost.php?page=1");
    }

    function test_input($data) {
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function slugify($text){
    
      $text = preg_replace('~[^\pL\d]+~u', '-', $text);
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
      $text = preg_replace('~[^-\w]+~', '', $text);
      $text = trim($text, '-');
      $text = preg_replace('~-+~', '-', $text);
      $text = strtolower($text);
    
      if (empty($text)) {
        return 'n-a';
      }
    
      return $text;
    }
?>
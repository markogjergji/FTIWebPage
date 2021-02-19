<!DOCTYPE html>
<div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>">
        <label for="fname">Name:</label>
        <input type="text" name="name">
        <label for="email">Email:</label>
        <input type="text" name="email">
        <input type="submit" value="Add Admin">
    </form>
</div>
<?php
    include("adminPanel.php");
    
    $query = "SELECT * FROM users WHERE role = 'Author'";

    $total_reg = "10";

    $bodyErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty($_POST["name"]) or empty($_POST["email"])) {
            $bodyErr = "Can't submit empty post";
        }
        else if(preg_match('/^[\w\-\.]+@fti\.edu\.al$/i',$_POST['email']) == 0){
            $bodyErr = "Email is not Valid.";
        }
        else{
            $query = "SELECT * FROM users WHERE email = '" .$_POST["email"]. "'";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) == 0){
                $name = $_POST["name"];
                $email = $_POST["email"];
                $query = "INSERT INTO users (name, email, role) VALUES ('$name', '$email', 'Admin')";
                $result = mysqli_query($conn,$query);
            }

            
            echo "<script> window.location.replace('adminDashboard.php') </script>";

        }
    }else{

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
            echo "<p id='post'>Name:". $data['name']. "Email:". $data['email']."</p><a href='?approve=True&user_id=".$data['id']."'><i class='fas fa-thumbs-up'></i></a>";
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
    elseif(isset($_GET['approve']) and isset($_GET['user_id'])){

        $query = "UPDATE users SET role = 'Admin' WHERE id = '" . $_GET['user_id'] ."'";
        $result = mysqli_query($conn,$query);
        
    }
}
    echo $bodyErr;
?>
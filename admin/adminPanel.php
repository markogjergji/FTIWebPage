<?php
session_start();
include('../config/database.php');

if(empty($_SESSION['email']) || empty($_SESSION['admin'])){
    header("location:mainPage.php");
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CABeeZee%3Aregular%2Citalic&amp;subset=latin%2Clatin-ext%2Cdevanagari&amp;ver=5.0.3' type='text/css' media='all' />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="../resources/css/adminPanel.css">

        <script async src="https://www.googletagmanager.com/gtag/js?id=G-7L6F8ZJH9H"></script>

    </head>
    <body>

        <div id="header">
            <p id="admin-panel-text">FTI - Admin Panel</p>
            <p id="user-admin-text"> <?php echo !empty($_SESSION['displayName'])?$_SESSION['displayName']:''; ?></p>
        </div>

        <nav>
            <ul id="links-container">
                <li class="link">
                    <a href="adminDashboard.php">Dashboard</a>
                </li>

                <li class="link">
                    <a href="adminAddPost.php">Add Post</a>
                </li>

                <li class="link">
                    <a href="adminEditPost.php?page=1">Edit Existing Posts</a>
                </li>

                <li class="link">
                    <a href="adminApprovePost.php?page=1">Approve Pending Posts</a>
                </li>

                <li class="link">
                    <a href="adminManageUsers.php?page=1">Manage Users</a>
                </li>

            </ul>
        </nav>
 


    </body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>FTI</title>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7L6F8ZJH9H"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-7L6F8ZJH9H', {
  'cookie_domain': 'localhost'
});
</script>
</head>

<body>
    <nav>
        <div>
            <?php
                session_start();

                if(!isset($_SESSION['displayName'])){
                    echo '<a class="sign-in" href= "app/Http/Controllers/AuthController.php" >Sign In</a>';
                    
                }
                else{
                    
                    echo '<a class="sign-out" href="app/Http/Controllers/SignOut.php">Sign Out</a>';
                    echo '<div class="user">'.$_SESSION['displayName'].'</div>';
                    echo '
                    <style type="text/css">
                        .search {
                            right: 24.5vw !important;
                        }
                        .top-header > ul {
                            right: 31vw !important;
                        }
                    </style>';
                    if(isset($_SESSION['admin'])){
                        if($_SESSION['admin']){
                            echo '<a class="panel" href="admin/adminDashboard.php">Admin Panel</a>';
                            echo '
                            <style type="text/css">
                                .search {
                                    right: 34.5vw !important;
                                }
                                .top-header > ul {
                                    right: 39vw !important;
                                }
                            </style>';
                        }
                    }

                }
            ?>
        </div>
    </nav>
    <main>
            <?php echo include("views/home.html"); ?>
            
    </main>

  </body>
</html>


<?php

$w1 = new EvTimer(2, 0, function () {
    echo "2 seconds elapsed\n";
});


function getUserCookie() {
    if(!isset($_COOKIE['visited'])) {
      // cookie is already set
    } else {
      list($usec, $sec) = explode(" ", microtime()); // Micro time!
      $expire = time()+60*60*24*30; // expiration after 30 day
      setcookie("visited", "".md5("".$sec.".".$usec."")."", $expire, "/", "", "0"); 
    }
    return $_COOKIE['visited'];
  }

  

?>
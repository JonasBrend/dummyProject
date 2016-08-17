<?php
if(isset($_SESSION['userid'])){
  include 'start.htm';
    echo '<a href="logout.php">Logout</a>'; 
    include 'kapitel2.html';
    
}
else
{
include 'startnl.html';    
}

?>
    

    


    
    
    
    
    




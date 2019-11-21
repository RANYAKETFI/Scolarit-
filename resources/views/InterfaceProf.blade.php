

<?php echo "Interface prof. Connecté : ";
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 }   
 if (isset($_SESSION['login']))
 {
     if ($_SESSION['type']==1)
     {
        echo $_SESSION['login'];
     }
 }
 ?>

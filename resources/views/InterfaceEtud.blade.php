

<?php echo "Interface etudiant. Connecté : ";
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 }   
 if (isset($_SESSION['login']))
 {
    if ($_SESSION['type']==2)
    {
       echo $_SESSION['login'];
    }
 }
 ?>

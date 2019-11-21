<html>
    <head><title>Test</title></head>
    <body>
    <?php
    session_start();
    $_SESSION['connexion']=1;
    echo $_SESSION['connexion']; 
  echo $_SESSION['a'];
    ?>
</body>
</html>
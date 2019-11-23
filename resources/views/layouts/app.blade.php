<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ESI-Scolarité</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
    <!-- Styles  -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/4.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">

    </script>
    <script>
    $(document).ready( function () {
        $('table').DataTable();
    } );
    </script>
    <style media="screen">
    .sidebar-container {
    position: fixed;
    width: 220px;
    height: 100%;
    left: 0;
    overflow-x: hidden;
    overflow-y: auto;
    background: #1a1a1a;
    color: #fff;
  }

  .content-container {
    padding-top: 20px;
  }

  .sidebar-logo {
    padding: 10px 15px 10px 30px;
    font-size: 20px;
    background-color: #2574A9;
  }

  .sidebar-navigation {
    padding: 0;
    margin: 0;
    list-style-type: none;
    position: relative;
  }

  .sidebar-navigation li {
    background-color: transparent;
    position: relative;
    display: inline-block;
    width: 100%;
    line-height: 20px;
  }

  .sidebar-navigation li a {
    padding: 10px 15px 10px 30px;
    display: block;
    color: #fff;
  }

  .sidebar-navigation li .fa {
    margin-right: 10px;
  }

  .sidebar-navigation li a:active,
  .sidebar-navigation li a:hover,
  .sidebar-navigation li a:focus {
    text-decoration: none;
    outline: none;
  }

  .sidebar-navigation li::before {
    background-color: #2574A9;
    position: absolute;
    content: '';
    height: 100%;
    left: 0;
    top: 0;
    -webkit-transition: width 0.2s ease-in;
    transition: width 0.2s ease-in;
    width: 3px;
    z-index: -1;
  }

  .sidebar-navigation li:hover::before {
    width: 100%;
  }

  .sidebar-navigation .header {
    font-size: 12px;
    text-transform: uppercase;
    background-color: #151515;
    padding: 10px 15px 10px 30px;
  }

  .sidebar-navigation .header::before {
    background-color: transparent;
  }

  .content-container {
    padding-left: 220px;
  }
  #etudiants {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#etudiants td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#etudiants tr:nth-child(even){background-color: #f2f2f2;}

#etudiants tr:hover {background-color: #ddd;}

#etudiants th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #2574A9;
  border: none;
  color: #FFFFFF;
  text-align: center;
  padding: 10px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

#table{
  background-color:#FBEFF2;
}
    </style>
</head>
<body>
  <script type="text/javascript">
  $(document).ready(function(){
$("#menu-toggle").click(function(e){
  e.preventDefault();
  $("#wrapper").toggleClass("menuDisplayed");
});
});
  </script>
    <div>
      
       <div class="sidebar-container">
     <div class="sidebar-logo">

       ESI-Scolarité
     </div>
     <ul class="sidebar-navigation">
     
     <?php
      if (($_SESSION['type'])==1) $table='enseignants' ; else $table='etudiants';
      $nom= DB::table($table)->where('login', $_SESSION['login'])->select('nom')->get()->first()->nom;
      $prenom= DB::table($table)->where('login', $_SESSION['login'])->select('prenom')->get()->first()->prenom;
          ?>

     <li class="header"><?php echo '<strong><center>'.$nom.' '.$prenom."</center></strong><center>".$_SESSION['login']; echo '</center>'; if ($_SESSION['type']==1) echo "<center><strong>(enseignant)</strong></center>" ; else
     {
      $id_groupe= DB::table('etudiants')->where('login', $_SESSION['login'])->select('id_groupe')->get()->first()->id_groupe;
      
        
      if (!empty($id_groupe)) $groupe= DB::table('groupes')->where('id', $id_groupe)->select('groupe')->get()->first()->groupe;
     echo "<center><strong>(étudiant - Groupe : ".$groupe.")</strong></center>";
     }
     ?></li>
       <li class="header">Fonctionnalités</li>
      
       <?php if ($_SESSION['type']==2)
       {
           ?>

       <li>
         <a href="/etud">
           <i class="fa fa-users" aria-hidden="true"></i> Mes absences
         </a>
       </li>

       <?php } 
       else
       {
           ?>
        <li>
        <a href="/prof">
          <i class="fa fa-users" aria-hidden="true"></i> Gérer les absences
        </a>
      </li>
        <?php
       }
       ?>
       <li>
         <a href="/compte">
           <i class="fa fa-tachometer" aria-hidden="true"></i> Gérer mon compte
         </a>
       </li>
       <li class="header"></li>
       
      
       <li>
         <a href="/deconnexion">
           <i class="fa fa-info-circle" aria-hidden="true"></i> Déconnexion
         </a>
       </li>
     </ul>
   </div>

   <div class="content-container">

     <div class="container-fluid">
       <!-- Main component for a primary marketing message or call to action -->
       <div class="jumbotron">
         <main class="py-4">
             @yield('content')
         </main>
       </div>

     </div>
   </div>


    </div>
</body>
</html>

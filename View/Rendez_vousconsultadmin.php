<?php
include '../Controller/DossierC.php';
include '../Controller/Rendez_vousC.php';
$DossierC = new DossierC();
$IdDossier=$_GET["IdDossier"];
$Dossier = $DossierC->recupererDossier($IdDossier);
$Rendez_vousC = new Rendez_vousC();
  $listRendez_vous = $Rendez_vousC->listRendez_vous($IdDossier);
  $nbrRendez_vous = $Rendez_vousC->CountRendez_vous($IdDossier);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/stylee.css" rel="stylesheet">
    <link href="../Public/header.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+icons+sharp">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../css/stylee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="../Public/header.css" rel="stylesheet">
</head>
<style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.content {
  padding: 20px;
}

.footer {
  background-color: #333;
  color: #fff;
  padding: 20px 0;
}

.footer-content {
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.footer-content p {
  margin: 0;
}

.social-links {
  list-style-type: none;
  padding: 0;
  display: flex;
}

.social-links li {
  margin-right: 10px;
}

.social-links a {
  color: #fff;
  text-decoration: none;
}

.social-links a:hover {
  color: #4CAF50;
}
body {
  font-family: Arial, sans-serif;
  margin: 0;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.navbar a:hover {
  background-color: #ddd;
  color: black;
}

.navbar a.active {
  background-color: #4CAF50;
  color: white;
}</style>
<body>
    <!-- Topbar Start -->
    <div class="navbar">
  <a href="#" class="active">Dashboard</a>
  <a href="#">Users</a>
  <a href="DossierPaneladmin.php">Dossier</a>
  <a href="#">Orders</a>
  <a href="DossierPanel.php">Switch</a>

</div>

                <div class="section" >
<h4 ><?php echo $nbrRendez_vous; ?>  Rendez_vouss</h4>

<?php foreach ($listRendez_vous as $Rendez_vous) { ?>
        <div class="item">
            <div class="content">
                <h6><a href="#" class="user"><?php echo $Rendez_vous['id_rendez_vous']; ?></a> <small><i><?php echo $Rendez_vous['date_rendez_vous']; ?></i></small></h6>
                <p class="text"><?php echo $Rendez_vous['objet']; ?></p>
                <a  name="modfier" href="Rendez_vousMod.php?IdDossier=<?php echo $Rendez_vous['iddossier']; ?>&id_rendez_vous=<?php echo $Rendez_vous['id_rendez_vous']; ?>">Modifier</a>
                            <a  name="supprimer" href="Rendez_vousSupp.php?IdDossier=<?php echo $Rendez_vous['iddossier']; ?>&id_rendez_vous=<?php echo $Rendez_vous['id_rendez_vous']; ?>">Supprimer</a>

            </div>
        </div>
    <?php } ?>
                </div>
                <!-- motivation List End -->

                <!-- motivation Form Start -->
              
</div>
                <!-- motivation Form End -->
            </div>

     

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <footer class="footer">
  <div class="footer-content">
    <p>&copy; 2024 Your Website. All rights reserved.</p>
    <ul class="social-links">
      <li><a href="#"><i class="fab fa-facebook"></i></a></li>
      <li><a href="#"><i class="fab fa-twitter"></i></a></li>
      <li><a href="#"><i class="fab fa-instagram"></i></a></li>
      <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
    </ul>
  </div>
</footer>
</body>

</html>
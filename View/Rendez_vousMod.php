<?php
include '../Controller/DossierC.php';
include '../Controller/Rendez_vousC.php';

$DossierC = new DossierC();
$Rendez_vousC = new Rendez_vousC();
$IdDossier = $_GET["IdDossier"];
$id_rendez_vous = $_GET["id_rendez_vous"];
$listRendez_vous = $Rendez_vousC->listRendez_vous($IdDossier);

$Dossier = $DossierC->recupererDossier($IdDossier);
$Rendez_vous = $Rendez_vousC->recupererRendez_vous($id_rendez_vous);


if (
  isset($_POST["objet"])) 
  {

    $Rendez_vous = new  Rendez_vous(
      $_POST['objet'],
          $_POST['date_rendez_vous'],
          $IdDossier
      
      );
    $Rendez_vousC->updateRendez_vous($Rendez_vous, $id_rendez_vous);
    header("Location:Rendez_vousconsultadmin.php?IdDossier=$IdDossier");

}
?>


<!DOCTYPE html>
<html lang="en">
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

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/stylee.css" rel="stylesheet">

</head>

<body>
<div class="navbar">
  <a href="#" class="active">Dashboard</a>
  <a href="#">Users</a>
  <a href="DossierPaneladmin.php">Dossier</a>
  <a href="#">Orders</a>
  <a href="DossierPanel.php">Switch</a>

</div>


                <div class="section">

    <?php foreach ($listRendez_vous as $Rendez_vous) { ?>
        <div class="item">
            <div class="content">
                <h6><a href="#" class="user"><?php echo $Rendez_vous['id_rendez_vous']; ?></a> <small><i><?php echo $Rendez_vous['date_rendez_vous']; ?></i></small></h6>
                <p class="text"><?php echo $Rendez_vous['objet']; ?></p>

              
            </div>
        </div>
    <?php } ?>

    <!-- Rendez_vous Form Start -->
    <div class="form-section">
        <h4>Leave a Rendez Vous</h4>
        <form id="myform" method="POST" class="form" enctype="multipart/form-data">
            <div class="form-group">
                <textarea rows="5" id="objet" name="objet" class="textarea"></textarea>
                <span id="objete"></span>
                <input type="date" id="date_rendez_vous" name="date_rendez_vous" >  

            </div>
            <div class="form-group">
                <button type="submit" class="btn-submit">Leave Your Rendez Vous</button>
            </div>
        </form>
    </div>
</div>

                <!-- motivation Form End -->
            </div>


            <script>

                let myForm = document.getElementById('myform');


                myForm.addEventListener('submit', function (e) {
                    let mycontent = document.getElementById('objet');


                    if (mycontent.value == '') {
                        let error = document.getElementById('objete');
                        error.innerHTML = "Le champs content est requis";
                        error.style.color = 'red';
                        e.preventDefault();
                    }



                })
                let myForma = document.getElementById('myforma');


                myForma.addEventListener('submit', function (e) {
                    let mynom = document.getElementById('objet');
                    

                    if (mynom.value == '') {
                        let error = document.getElementById('objet');
                        error.innerHTML = "Le champs mynom est requis";
                        error.style.color = 'red';
                        e.preventDefault();
                    }
                  



                })


            </script>
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
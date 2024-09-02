<?php
include '../Controller/DossierC.php';
include '../Controller/Rendez_vousC.php';
$DossierC = new DossierC();
$IdDossier=$_GET["IdDossier"];
$Dossier = $DossierC->recupererDossier($IdDossier);
$Rendez_vousC = new Rendez_vousC();
  $listRendez_vous = $Rendez_vousC->listRendez_vous($IdDossier);
  $nbrRendez_vous = $Rendez_vousC->CountRendez_vous($IdDossier);
  

  if (
    isset($_POST["objet"]) 
) {
    if (
        !empty($_POST['objet'])  )
    {
      $Rendez_vous = new  Rendez_vous(
        $_POST['objet'],
            $_POST['date_rendez_vous'],
            $IdDossier
        
        );
        
        

       
        $Rendez_vousC->addRendez_vous($Rendez_vous);
        header("Location:Rendez_vousAjout.php?IdDossier=$IdDossier");}
    } else
        $error = "Missing information";
?>

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
</style>

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

<body>

    <!-- Topbar Start -->
   

<header>

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand me-auto" href="#">Logo</a>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Logo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active mx-lg-2" aria-current="page" href="DossierPanel.php">Dossier Front</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="#">Job
                            Listings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="#">Forum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="#">Courses</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Explore
                        </a>
                        <ul class="dropdown-menu mx-lg-2">
                            <li><a class="dropdown-item" href="#">Discover</a></li>
                            <li><a class="dropdown-item" href="#">Community</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Guides</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        
            <a href="DossierPaneladmin.php" class="login-button">Switch</a>
       
        <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </div>

</nav>
</header>

                <!-- motivation Form Start -->
                <div class="form-section" style="margin-top: 250px;">
        <h4>Book a rendez vous</h4>
        <form id="myform" method="POST" class="form" enctype="multipart/form-data">
            <div class="form-group">
                <textarea rows="5" id="objet" name="objet" class="textarea"></textarea>
                <span id="objete"></span>

                <input type="date" id="date_rendez_vous" name="date_rendez_vous" >  

                <span id="cverror"></span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn-submit">Leave Your Rendez vous</button>
            </div>
        </form>
    </div>
</div>
                <!-- motivation Form End -->
            </div>

     

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>

let myForm = document.getElementById('myform');


myForm.addEventListener('submit' , function(e){
    let myobjet = document.getElementById('objet');


  if(myobjet.value =='')
  {
    let error = document.getElementById('objete');
    error.innerHTML = "Le champs objet est requis";
    error.style.color = 'red';
    e.preventDefault();
  }



})
document.addEventListener('DOMContentLoaded', function() {
    let myForma = document.getElementById('myforma');

    myForma.addEventListener('submit', function(e) {
        let myobjet = document.getElementById('objet');
        

        let isValid = true; // Flag to track form validity

        document.querySelectorAll('.error-message').forEach(function(error) {
            error.textContent = '';
        });

        if (myobjet.value.trim() === '') {
            let error = document.getElementById('objet-error');
            error.textContent = "Le champ objet est requis";
            error.style.color = 'red';
            isValid = false;
        }
       
        if (!isValid) {
            e.preventDefault(); // Prevent the form from submitting
        }
    });
});





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
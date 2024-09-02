<?php
include '../Controller/DossierC.php';
include '../Controller/Rendez_vousC.php';

$DossierC = new DossierC();
$IdDossier=$_GET["IdDossier"];
$Dossier = $DossierC->recupererDossier($IdDossier);

if (
    isset($_POST["nom_patient"]) &&
    isset($_POST["diagnostic"])
) {
    try {
        // Check if the file was uploaded successfully
        if ($_FILES["image"]["error"] === UPLOAD_ERR_OK) {
            $imageData = file_get_contents($_FILES["image"]["tmp_name"]);
            $imageType = $_FILES["image"]["type"];
        } else {
            // Use existing image data if no new image is uploaded
            $imageData = $Dossier["image_Data"];
            $imageType = $Dossier["image_Type"];
        }

        // Validate and sanitize user input
        $nom_patient = $_POST["nom_patient"];

        $diagnostic = $_POST["diagnostic"];

       

        // Update the Dossier
        $Dossier = new Dossier($nom_patient, $imageData, $imageType,$diagnostic);
        $DossierC->updateDossier($Dossier, $IdDossier);
        header("Location: DossierPaneladmin.php");
        exit(); // Use exit after redirection to prevent further script execution
    } catch (Exception $e) {
        // Handle any exceptions or errors
        echo "Error: " . $e->getMessage();
    }}
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+icons+sharp">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../css/stylee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="../Public/header.css" rel="stylesheet">
</head>
<style>body {
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
</style>

<body>
    <!-- Topbar Start -->
    <div class="navbar">
  <a href="#" class="active">Dashboard</a>
  <a href="#">Users</a>
  <a href="DossierPaneladmin.php">Dossier</a>
  <a href="#">Orders</a>
  <a href="#">Settings</a>
</div>

    <!-- Blog Start -->
    <div >
        <div >
            <div >
                <!-- Blog Detail Start -->
                <div class="container">
    <h2 class="heading">Modify nb</h2>

    <form action="" method="POST" id="myforma" enctype="multipart/form-data" class="form">
        <div class="form-group">
            <label for="nom_patient" class="label">nom_patient</label>
            <input type="text" id="nom_patient" name="nom_patient" value="<?php echo $Dossier['nom_patient']; ?>"  class="input">
            <span id="nom_patient"></span>

        </div>
       
        <div class="form-group">
            <label for="diagnostic" class="label">diagnostic</label>
            <input type="text" id="diagnostic" name="diagnostic" value="<?php echo $Dossier['diagnostic']; ?>"  class="input">
            <span id="diagnostic"></span>

        </div>

        <div class="image-preview">
            <img src="data:<?php echo $Dossier['image_Type']; ?>;base64,<?php echo base64_encode($Dossier['image_Data']); ?>" alt="Image Preview" class="image-preview-img">
            <div class="form-group">
                <label for="image" class="label">Image</label>
                <input type="file" id="image" name="image" class="input-file">
                <span class="error-message" id="image-error"></span>
                <input type="hidden" name="image_type" id="image_type">
            </div>
        </div>

        <div class="button-group">
            <button class="btn btn-cancel">
                <a href="DossierPanel.php" class="link">Cancel</a>
            </button>
            <button type="submit" class="btn btn-submit">
                <a href="DossierPaneladmin.php" class="link">Submit</a>
            </button>
        </div>
    </form>

    <div class="footer">
        
        <div class="stats">
            <span class="icon"><i class="far fa-eye"></i></span>
            <span class="count">12345</span>
            <span class="icon"><i class="far fa-comment"></i></span>
            <span class="count">123</span>
        </div>
    </div>
</div>

                <!-- Blog Detail End -->

                <!-- Comment List Start -->


               

     

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>

let myForm = document.getElementById('myform');


myForm.addEventListener('submit' , function(e){
    let mynb = document.getElementById('motivation');


  if(mynb.value =='')
  {
    let error = document.getElementById('motivation');
    error.innerHTML = "Le champs nb est requis";
    error.style.color = 'red';
    e.preventDefault();
  }



})
document.addEventListener('DOMContentLoaded', function() {
    let myForma = document.getElementById('myforma');

    myForma.addEventListener('submit', function(e) {
        let mynom_patient = document.getElementById('nom_patient');
        let myduration = document.getElementById('duration');
        let mydiagnostic = document.getElementById('diagnostic');
        let mynbe = document.getElementById('nb');

        let isValid = true; // Flag to track form validity

        document.querySelectorAll('.error-message').forEach(function(error) {
            error.textContent = '';
        });

        if (mynom_patient.value.trim() === '') {
            let error = document.getElementById('nom_patient-error');
            error.textContent = "Le champ nom_patient est requis";
            error.style.color = 'red';
            isValid = false;
        }
        if (myduration.value.trim() === '') {
            let error = document.getElementById('duration-error');
            error.textContent = "Le champ duration est requis";
            error.style.color = 'red';
            isValid = false;
        }
        if (mydiagnostic.value.trim() === '') {
            let error = document.getElementById('diagnostic-error');
            error.textContent = "Le champ diagnostic est requis";
            error.style.color = 'red';
            isValid = false;
        }
        if (mynbe.value.trim() === '') {
            let error = document.getElementById('nb-error');
            error.textContent = "Le champ nb est requis";
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
<?php
include '../Controller/DossierC.php';
$error = '';
$DossierC = new DossierC();
$listDossier = $DossierC->listDossier();

if (isset($_POST["nom_patient"])&& isset($_POST["diagnostic"])) {
    if (!empty($_POST['nom_patient'])&& !empty($_POST["diagnostic"])) {


        if (!empty($_FILES['image']['tmp_name'])) {
            $image_data = file_get_contents($_FILES['image']['tmp_name']);
            $image_type = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        } else if (!is_null($imageData)) {
            $image_data = $imageData;
            $image_type = $imageType;
        }

        $Dossier = new Dossier(
            $_POST['nom_patient'],
            $image_data,
            $image_type,
            $_POST['diagnostic']
        );
        $DossierC->addDossier($Dossier);
        header('Location:DossierPanel.php');
    } else {
        $error = "Missing information";
    }
}
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" nb="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Try</title>
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
</style>

<body>

   

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
                        <a class="nav-link active mx-lg-2" aria-current="page" href="#">Dossier Front</a>
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
        <!----- end of aside -->
        <main >

    <section class="content-section">
        <h2 class="section-heading">Recent Dossier</h2>
        <div class="article-search">
            <input type="text" id="search-field" placeholder="Search..." name="search">
            <select id="sort-select">
                <option value="title">Title</option>
                <option value="date">Date</option>
            </select>
        </div>
        <ul class="content-list">
            <?php foreach ($listDossier as $Dossier) { ?>
            <li class="content-item">
                <div class="content-info">
                    <h3 class="content-title">
                        <?php echo $Dossier['nom_patient']; ?>
                    </h3>
                  
                    <span class="content-time">
                        <?php echo $Dossier['date_creation']; ?>
                    </span>
                    <br>
                    <span class="content-time">
                        <?php echo $Dossier['diagnostic']; ?>
                    </span>
                </div>
                <div class="content-image">
                    <img src="data:<?php echo $Dossier['image_Type']; ?>;base64,<?php echo base64_encode($Dossier['image_Data']); ?>"
                        alt="<?php echo $Dossier['nom_patient']; ?>" class="content-img">
                </div>
                <br>
                <button onclick="location.href='Rendez_vousAjout.php?IdDossier=<?php echo $Dossier['iddossier']; ?>'" class="content-action">Book Rendez_vous</button>

                <div class='sharethis-inline-share-buttons' style="margin-top:20px; "></div>

            </li>
            <?php } ?>
        </ul>
    </section>



</main>
<script>
     // Get the input field and article list
     document.addEventListener('DOMContentLoaded', function () {
    const searchField = document.getElementById('search-field');
    const articleList = document.querySelector('.content-list');
    const sortSelect = document.getElementById('sort-select');

    // Function to handle article search
    function handleSearch() {
        const searchTerm = searchField.value.trim().toLowerCase();

        for (const article of articleList.children) {
            const articleTitle = article.querySelector('.content-info h3').textContent.trim().toLowerCase();
            const articleDate = article.querySelector('.content-time').textContent.trim().toLowerCase();

            if (articleTitle.includes(searchTerm) || articleDate.includes(searchTerm)) {
                article.style.display = 'block';
            } else {
                article.style.display = 'none';
            }
        }
    }

    // Add event listener for search field
    searchField.addEventListener('keyup', handleSearch);

    // Function to sort articles
    function sortArticles() {
        const sortBy = sortSelect.value;
        const articleListItems = Array.from(articleList.children);

        articleListItems.sort((a, b) => {
            const titleA = a.querySelector('.content-info h3').textContent.trim().toLowerCase();
            const titleB = b.querySelector('.content-info h3').textContent.trim().toLowerCase();
            const dateA = a.querySelector('.content-time').textContent.trim().toLowerCase();
            const dateB = b.querySelector('.content-time').textContent.trim().toLowerCase();

            if (sortBy === 'title') {
                return titleA.localeCompare(titleB);
            } else if (sortBy === 'date') {
                return dateA.localeCompare(dateB);
            }
        });

        articleList.innerHTML = ''; // Clear the current list

        // Append the sorted articles to the list
        articleListItems.forEach(article => articleList.appendChild(article));
    }

    // Add event listener for sort select
    sortSelect.addEventListener('change', sortArticles);
});

    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.6.0/jszip.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
    let myForm = document.getElementById('myForm');

    myForm.addEventListener('submit', function (e) {
        let mytest = document.getElementById('nom_patient');
        let mynb = document.getElementById('nb');
        let mydiagnostic = document.getElementById('diagnostic');
        let myduration = document.getElementById('duration');
        let regex = /^[a-zA-Z0-9\s]+$/; // Updated regex to allow spaces as well

        let errornom_patient = document.getElementById('titreerror');
        let errornb = document.getElementById('nberror');
        let errordiagnostic = document.getElementById('diagnosticerror');
        let errorduration = document.getElementById('durationerror');

        // Clear previous error messages
        errornom_patient.textContent = '';
        errornb.textContent = '';
        errordiagnostic.textContent = '';
        errorduration.textContent = '';

        // Validate each field
        if (mytest.value.trim() === '') {
            errornom_patient.textContent = "Le champ titre est requis";
            errornom_patient.style.color = 'red';
            e.preventDefault();
        } else if (!regex.test(mytest.value)) {
            errornom_patient.textContent = "Le champ titre ne doit contenir que des caractères alphabétiques et des espaces";
            errornom_patient.style.color = 'red';
            e.preventDefault();
        }

      

        if (mydiagnostic.value.trim() === '') {
            errordiagnostic.textContent = "Le champ diagnostic est requis";
            errordiagnostic.style.color = 'red';
            e.preventDefault();
        }
    });
});

</script>
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=644ede74ac242f001bf9c526&product=inline-share-buttons' async='async'></script>

   
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
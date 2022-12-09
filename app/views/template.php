<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wine Not</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/morph/bootstrap.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../public/images/Logo.svg">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav d-flex justify-content-center align-items-center">
        <li class="nav-item">
          <a class="nav-link" href="<?=URL?>accueil">
          <img src="../App/public/images/Logo.svg" alt="" width="60px">
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=URL?>accueil">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=URL?>vins">Vins</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="container">
      <h1 class="rounded border border-dark m-2 p-2 text-center text-white bg-info"><?= $Reference ?></h1>
      <?= $content; ?> 
    </div>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
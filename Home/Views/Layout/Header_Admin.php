<?php
session_start();

if ($_SESSION['active'] == true) {

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>:: Mi Agenda App ::</title>

     <!-- ==== Bootstrap === -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- ====== Estilos Customizados =====  -->
    <link rel="stylesheet" href="../../Assets/Css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

    <!-- ===== Íconos ====== -->
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >

    <!-- =========== Swwet Alert 2 ======== -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.0/dist/sweetalert2.all.min.js"></script>
     <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.0/dist/sweetalert2.min.css" rel="stylesheet">

     <!-- ===== JQuery para manejo de AJAX ====== -->

     <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

  </head>
  <body>
    <header class="bg-primary py-3">
  <div class="container d-flex justify-content-between align-items-center">
    <a href="/" class="text-decoration-none">
      <h1 class="h4 text-white fw-bold text-center mb-0">
        Agenda <span class="fw-normal">App</span>
      </h1>
    </a>

    <!-- Menú para pantallas grandes -->
    <nav class="d-none d-md-flex align-items-center gap-3 fw-bold text-white">
      <a href="../../logout.php" class="btn btn-outline-light py-1 px-4">Cerrar Sesión</a>
    </nav>

    <!-- Menú hamburguesa móvil -->
    <div class="d-md-none position-relative">
      <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu" aria-expanded="false" aria-controls="mobileMenu">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M2 4.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 4.5zm0 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
        </svg>
      </button>

      <div class="collapse position-absolute top-100 end-0 bg-primary p-3 rounded shadow-sm z-3" id="mobileMenu" style="min-width: 200px;">
        <ul class="list-unstyled mb-0 text-end">
          <li class="mb-2">
            <a href="/my-properties" class="d-block text-white text-decoration-none py-1 px-2 rounded hover-opacity">My Properties</a>
          </li>
          <li>
            <form action="/auth/close-session" method="post">
              <input type="hidden" name="_csrf" value="{{ csrfToken }}">
              <input type="submit" class="btn btn-link text-white text-decoration-none text-end w-100 px-2 py-1" value="LogOut">
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>

    <div class="bg">
    <div class="container py-5">
        <div class="text-center mb-4">
            <h1 class="display-4 fw-bold mb-4 text-white">
                Agenda <span class="fw-normal">App</span>
            </h1>
            <img src="../../Assets/Images/logo.png" alt="" width="100" height="90">
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="alert alert-danger" role="alert" id="error" style="margin-top: .5em; display: none;"></div>
                <div class="card shadow">
                    <div class="card-body p-4">
<?php
} else {
    $_SESSION['active'] = false;
    header('Location: ../../index.php');
}
?>
                    
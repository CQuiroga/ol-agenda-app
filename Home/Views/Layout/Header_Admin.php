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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Assets/Css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </head>
  <body>
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
                    
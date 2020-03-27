<?php 
  if ($_SESSION['status'] != 'login') {
    header('Location: '.BASEURL.'/auth/login');
  } elseif($_SESSION['role'] == "1")  {
    header('Location: '.BASEURL.'/user');
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="<?=BASEURL; ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= BASEURL; ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- USER Style -->
  <link rel="stylesheet" href="<?=BASEURL ?>/assets/css/style2.css">

  <!-- Table -->
  <link rel="stylesheet" href="<?= BASEURL?>/assets/css/dataTables.bootstrap4.min.css">
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"> -->
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
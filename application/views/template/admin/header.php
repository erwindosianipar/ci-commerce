<?php
if(isset($_SESSION['log_admin']) && $_SESSION['log_admin'] === TRUE){
}else{show_404();}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="<?= base_url('assets/fonts/proxima-nova.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/sb-admin/css/sb-admin-2.min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/fontawesome/5.8.1/css/all.min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">

	<title><?= $title; ?></title>
</head>
<body id="page-top">
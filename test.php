<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Diversion Industries Inc.</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../../bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">
      <!-- Alertify -->
  <link rel="stylesheet" href="../../../plugins/alertify/alertify.core.css">
  <link rel="stylesheet" href="../../../plugins/alertify/alertify.default.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<!-- alertify script -->
<script src="../../../plugins/alertify/alertify.js"></script>
<script src="../../../plugins/alertify/alertify.min.js"></script>


</head>
<style>
    .dropdown-menu {
    max-height: 150px;
    overflow: visible;
    overflow-y: scroll;
}
</style>
<div class="container">
    <h2>Dropdowns</h2>

    <div class="dropdown position-relative">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            Dropdown button
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#" title="Header" data-toggle="popover" data-boundary="window" data-placement="right" data-trigger="hover" data-content="Some content">Link 1</a>
            <a class="dropdown-item" href="#" title="Header" data-toggle="popover" data-boundary="window" data-placement="right" data-trigger="hover" data-content="Some content">Link 2</a>
            <a class="dropdown-item" href="#" title="Header 3" data-toggle="popover" data-boundary="window" data-placement="right" data-trigger="hover" data-content="Some content 3">Link 3</a>
            <a class="dropdown-item" href="#" title="Header 4" data-toggle="popover" data-boundary="window" data-placement="right" data-trigger="hover" data-content="Some content 4">Link 4</a>
            <a class="dropdown-item" href="#" title="Header 5" data-toggle="popover" data-boundary="window" data-placement="right" data-trigger="hover" data-content="Some content 5">Link 5</a>
            <a class="dropdown-item" href="#" title="Header 6" data-toggle="popover" data-boundary="window" data-placement="right" data-trigger="hover" data-content="Some content 6">Link 6</a>
            <a class="dropdown-item" href="#">Link 7</a>
            <a class="dropdown-item" href="#">Link 8</a>
            <a class="dropdown-item" href="#">Link 9</a>
        </div>

        <script>
              $('[data-toggle="popover"]').popover({});
        </script>
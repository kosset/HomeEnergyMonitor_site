<?php
  // Start the session
  session_start();
  header( "Content-Type: text/html; charset=utf-8" );
?>
<!DOCTYPE html>
<html lang="el"><!--Maybe changing it to "el", we'll see-->
  <head>
    <title>ΟΕΗΕ&trade;</title>
    <meta name="description" content="Web Application for Home Energy Monitor using Maxim's 78M6610+PSU and Arduino Yun">
    <meta name="author" content="Seretakis Konstantinos, Setzas Konstantinos">
    <link rel="icon" href="images/hem.ico">

    <!-- Bootstrap 3 is mobile-first 
         The width=device-width part sets the width of the page to follow the screen-width of the device (which will vary depending on the device).
         The initial-scale=1 part sets the initial zoom level when the page is first loaded by the browser. -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
    
    <!-- Personal Style -->
    <link href="personal_style.css" rel="stylesheet">
  </head>

  <body role="document">
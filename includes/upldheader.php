<?php 
//This includes the session file. This file contains code that starts/resumes a session. 
//By having it in the header file, it will be included on every page, allowing session capability to be used on every page across the website.
include_once 'includes/session.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attention - <?php echo $title ?></title>
    

    <link rel="stylesheet" href="css\signin.css" />
    <link rel="stylesheet" href="upload.css" />  
    <link rel="stylesheet" href="courselist.css" />   
</head>
<body>
    
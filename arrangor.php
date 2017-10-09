<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <title>A clean template</title>
    <link rel="stylesheet" type="text/css" href="CSS\standard.css">
    <style type="text/css">


    </style>

  </head>

  <body id="Site">
    <header id="header">
      <div id="inner-header">
        <div>
          <h1 id="overskrift1">WELCOME</h1>
        </div>
        <div id="menubar">
          <ul id="menu">
              <li><a>Min Side</a></li>
              <li><a href="konsertoversikt.html">Konsertoversikt</a></li>
              <li><a href="Log_In/login.php"> Log Out</a></li>
          </ul>
        </div>
      </div>
    </header>

    <main id="Main-content">
        <p >Hello</p>
        <?php
            include("config.php");
            // selects conserts and scenes from the database
        
        



       $sql="Select name from  konstert";

       $result = $conn->query($sql);

       $menu=" "; 

       while (odbc_fetch_row($rs))

       {

           $menu.= '<option>'. odbc_result($rs,"ProbType").'</option>';

       }

       echo $menu;

       $conn->close();


?>
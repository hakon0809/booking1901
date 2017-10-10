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
              <li><a href="konsertoversikt.php">Konsertoversikt</a></li>
              <li><a href="Log_In/login.php"> Log Out</a></li>
          </ul>
        </div>
      </div>
    </header>

    <main id="Main-content">



<title>My list</title>
    <script type="text/javascript">
//----------------------------------------------------------------
// SENDS SELECTED OPTION TO RETRIEVE DATA TO FILL TABLE.
function send_option () {
var sel = document.getElementById( "my_select" );
var txt = document.getElementById( "my_option" );
txt.value = sel.options[ sel.selectedIndex ].value;
var frm = document.getElementById( "my_form" );
frm.submit();
}
//----------------------------------------------------------------
        </script>

    Click on any option
    <br/>
    <select id="my_select" onchange="send_option();">
    <option>Velg konsert</option>
<?php
        include ("config.php");
//----------------------------------------------------------------
// LIST FILLED FROM DATABASE (ALLEGEDLY).
            $sql = "SELECT k_name, k_id FROM konsert";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()){
                echo "<option value='konsertValue'>" . $row['k_name'] . "</option>";
            }
//----------------------------------------------------------------
?>
    </select>
    <br/> 
    <br/>
    <table>
<?php
//----------------------------------------------------------------
// TABLE FILLED FROM DATABASE ACCORDING TO SELECTED OPTION.
if ( IsSet( $_POST["my_option"] ) ){ // IF USER SELECTED ANY OPTION.
$sql = "SELECT users.name, users.mobile, users.email
            FROM users INNER JOIN user_konsert
            ON users.u_id = user_konsert.user_id AND user_konsert.k_name = '$_POST[my_opinion]'";
            $result = $conn->query($sql);
            //if( IsSet ($_POST["my_opinion"])){
                if ($result->num_rows > 0){ 
                echo "<table><tr>
                <th>Navn</th>
                <th>MobileNr</th>
                <th>Mail</th>
                </tr>";
                while ($row = $result->fetch_assoc()) {

                echo "<tr>
                <td>" . $row["name"]. "</td>
                <td>" . $row["mobile"]. "</td>
                <td>" . $row["email"]. "</td>
                </tr>";
                }
    echo "</table>";
                }
    else{
    echo "0 results";
    }}
    $conn->close();
//----------------------------------------------------------------
?>
    </table>

<!-- FORM TO SEND THE SELECTED OPTION. -->
    <form method="post" action"page2.php" style="display:none" id="my_form">
      <input type="text" id="my_option" name="my_option"/>
    </form>

        
        
        
        
        
         </main>

    <footer id="footer">Foot</footer>

  </body>
</html>
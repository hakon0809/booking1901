<html>
  <head>
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
  </head>
  <body>

    Click on any option
    <br/>
    <select id="my_select" onchange="send_option();">
      <option>Select an option</option>
<?php
        include("config.php");
//----------------------------------------------------------------
// LIST FILLED FROM DATABASE (ALLEGEDLY).
for ( $i = 0; $i < 5; $i++ )
{ $text = chr($i+65) . chr($i+65) . chr($i+65);
  echo "<option value='" . $text . "'>" . $text . "</option>";
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
if ( IsSet( $_POST["my_option"] ) ) // IF USER SELECTED ANY OPTION.
     for ( $i = 0; $i < 4; $i++ ) // DISPLAY ROWS.
     { echo "<tr>";
       for ( $j = 0; $j < 6; $j++ ) // DISPLAY COLUMNS.
         echo "<td>" . $_POST["my_option"] . "</td>"; // DISPLAY OPTION.
       echo "</tr>";
     }
else echo "<tr><td>Table empty</td></tr>";
//----------------------------------------------------------------
?>
    </table>


  </body>
</html>
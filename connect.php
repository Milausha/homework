<?php
mysql_connect("localhost", "milausha", "1234")
or die("<p>Error connecting to database " . mysql_error() . "</p>");

mysql_select_db("orders")
 or die("<p>Error selecting database ! ". mysql_error() . "</p>");
?>
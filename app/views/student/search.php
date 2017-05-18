<?php
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8" />
  <title>A Virtual Campus</title>
 </head>
 <body>
  
  <header>
   <h1>Search result for {query}:</h1>
  </header>
  
 <ul>
   <!-- START results -->
   <li>Roll Number = {roll_number}</li>
   <li>First Name  = {first_name}</li>
   <li>Last Name   = {last_name}</li>
   <li>Semester    = {semester}</li>
   <li>Major       = {major}</li>
   <li>Grade       = {grade}</li>
   <!-- END results -->
 </ul>

 
 <form id = "edit" method = "post" action = "edit/{roll_number}" >
        <label>
		  <input type = "submit" name = "edit" value = "EDIT">
        </label>
 </form>	
 <br>
<form id = "delete" method = "post" action = "delete" >
        <label>
		  <input type = "submit" name = "edit" value = "DELETE">
        </label>
</form>	
 
  <footer>
   <p class = "copyright">
    &copy 2017 Mubashir Mufti
	</p>
 </body>
</html>
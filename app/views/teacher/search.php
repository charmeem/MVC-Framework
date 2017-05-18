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
   <li>First Name             = {first_name}</li>
   <li>Last Name              = {last_name}</li>
   <li>Education              = {education}</li>
   <li>Subject1 and Semester  = {sub1}</li>
   <li>Subject2 and Semester  = {sub2}</li>
   <li>Subject3 and Semester  = {sub3}</li>
      <!-- END results -->
 </ul>

 <form id = "edit" method = "post" action = "edit" >
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
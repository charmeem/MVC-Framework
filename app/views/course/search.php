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
   <h2>Search result for {query}:</h2>
  </header>
  
 
<table>
 <tr>
  <th>Course ID</th>
  <th>Course Name</th>
  <th>Semester</th>
  <th>Credit hours</th>
 </tr>
 <tr>
  <td>{id}</td>
  <td>{name}</td>
  <td>{semester}</td>
  <td>{credit}</td>
 </tr>
</table> 
<br><br>
<form id = "edit" method = "post" action = "edit/{id}" >
        <label>
		  <input type = "submit" name = "edit" value = "EDIT">
        </label>
</form>	
 <br>
<form id = "delete" method = "post" action = "delete/{id}" >
        <label>
		  <input type = "submit" name = "delete" value = "DELETE">
        </label>
</form>	
<br><br>
<a href = "../course">
    <button>Back to Main page</button>
</a>

<br><br><br><br><br><br><br><br> 
 <footer>
   <p class = "copyright">
    &copy 2017 Mubashir Mufti
	</p>
 </body>
</html>
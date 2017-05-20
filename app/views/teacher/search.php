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
  
 <table>
 <tr>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Education</th>
  <th>Subject1 & semester</th>
  <th>Subject2 & semester</th>
  <th>Subject3 & semester</th>
 </tr>
 <tr>
  <td>{first_name}</td>
  <td>{last_name}</td>
  <td>{education}</td>
  <td>{sub1}</td>
  <td>{sub2}</td>
  <td>{sub3}</td>
</tr>
</table> 
<br><br>

 <form id = "edit" method = "post" action = "edit/{first_name}" >
        <label>
		  <input type = "submit" name = "edit" value = "EDIT">
        </label>
 </form>	
 <br>
<form id = "delete" method = "post" action = "delete/{first_name}" >
        <label>
		  <input type = "submit" name = "edit" value = "DELETE">
        </label>
</form>	
 
<a href = "../student">
    <button>Back to Main page</button>
</a>

<br><br><br><br><br><br><br><br> 

 <footer>
   <p class = "copyright">
    &copy 2017 Mubashir Mufti
	</p>
 </body>
</html>
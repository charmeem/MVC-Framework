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
   <h1>Student section of virtual CAMPUS</h1>
    <section>
	    <form method = "post" action = "../update/{roll_number}">
		    <h2>Edit Student data</h2>
			<label>
			    Roll Number:
			    <input type="text" name="roll_number" value = "{roll_number}"/>
			</label>
			<label>
			    First Name:
			    <input type="text" name="first_name" value = "{first_name}"/>
			</label>
			<label>
			    Last Name:
			    <input type="text" name="last_name" value = "{last_name}"/>
			</label>
			<label>
			    Current Semester:
			    <input type="text" name="semester" value = "{semester}"/>
			</label>
			<label>
			    Major:
			    <input type="text" name="major" value = "{major}"/>
			</label>
			<br><br>
			<label>
			    Grade:
			    <input type="text" name="grade" value = "{grade}"/>
			</label>
			<label>
		  <input type = "submit"  value = "Update Record">
        </label>
		</form>
		
    </section>
	
	
	<br><br>
	 
   </header>
  <footer>
   <p class = "copyright">
    &copy 2017 Mubashir Mufti
	</p>
 </body>
</html>
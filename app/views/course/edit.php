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
   <h1>Course section of virtual CAMPUS</h1>
    <section>
	    <form method = "post" action = "../update/{id}">
		    <h2>Edit Course data</h2>
			<label>
			    Course ID:
			    <input type="text" name="id" value = "{id}"/>
			</label>
			<label>
			    Course Name:
			    <input type="text" name="name" value = "{name}"/>
			</label>
			<label>
			    Offered semester:
			    <input type="text" name="semester" value = "{semester}"/>
			</label>
			<label>
			    Credit hours:
			    <input type="text" name="credit" value = "{credit}"/>
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
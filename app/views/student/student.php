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
   <h1>Welcome to the Student section of virtual CAMPUS</h1>
    <section>
	    <form id="add_student" method="post" action="<?php echo $add_student_action ?>">
		    <h2>Add Student data</h2>
			<label>
			    First Name
			    <input type="text" name="first-name" />
			</label>
			<label>
			    Last Name
			    <input type="text" name="last-name" />
			</label>
			<label>
			    Semester
			    <input type="text" name="semester" />
			</label>
			<label>
			    Major
			    <input type="text" name="Major" />
			</label>
			<label>
			    Grade obtained
			    <input type="text" name="Grade" />
			</label>
			<input type="submit" Value="Enter" />
		</form>				
    </section>	
   </header>
  <!--<a href = "<?php echo $add_student; ?>"> Go to Add Student Section </a> -->
  <footer>
   <p class = "copyright">
    &copy 2017 Mubashir Mufti
	</p>
 </body>
</html>
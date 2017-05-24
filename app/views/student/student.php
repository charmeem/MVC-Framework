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
	    <form id="add_student" method="post" action="<?php echo $add; ?>">
		    <h2>Add Student data</h2>
			<label>
			    Roll Number:
			    <input type="text" name="roll_number" />
			</label>
			<label>
			    First Name:
			    <input type="text" name="first_name" />
			</label>
			<label>
			    Last Name:
			    <input type="text" name="last_name" />
			</label>
			<label>
			    Current Semester:
			    <input type="text" name="semester" />
			</label>
			<label>
			    Major:
			    <input type="text" name="major" />
			</label>
			<br><br>
			<label>
			    Grade:
			    <input type="text" name="grade" />
			</label>
			<input type="submit" Value="Enter" />
		</form>				
    </section>
	<br><br>
	
	<br><br>
	<!--Adding listAll action -->
	<form id = "list" method = "post" action = "student/listAll" >
        <label>
		  <input type = "submit" name = "listAll" value = "List All Records">
        </label>
    </form>	

	<!--Adding Search action -->
	<section>
	  <form id = "search" method = "post" action = "<?php echo $search; ?>" >
        <label>
		  Search Student :
		  <input type = "text" name = "student_search" >
		  <input type = "submit" name = "search" value = "SEARCH">
        </label>
      </form>		
	</section>
  </header>
  <br><br>

<a href = "http://localhost/webapp/">
    <button>Back to Main page</button>
</a>

<br><br><br><br><br><br><br><br>
  
  
  <footer>
   <p class = "copyright">
    &copy 2017 Mubashir Mufti
	</p>
 </body>
</html>
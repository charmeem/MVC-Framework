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
   <h1>Welcome to the Teacher section of virtual CAMPUS</h1>
    <section>
	    <form id="add_student" method="post" action="<?php echo $add; ?>">
		    <h2>Add Teacher data</h2>
			<label>
			    First Name:
			    <input type="text" name="first_name" />
			</label>
			<label>
			    Last Name:
			    <input type="text" name="last_name" />
			</label>
			<label>
			    Education:
			    <input type="text" name="education" />
			</label>
			<label>
			    Subject_Semester:
			    <input type="text" name="sub1" />
			</label>
			<label>
			    Subject_Semester:
			    <input type="text" name="sub2" />
			</label>
			<label>
			    Subject_Semester:
			    <input type="text" name="sub3" />
			</label>
			<br>
			<input type="submit" Value="Enter" />
		</form>				
    </section>
	<br><br>
	<section>
	  <a href = "<?php echo $listAll; ?>"> List all Teachers </a>
    </section>
	<br><br>
	<section>
	  <form id = "search" method = "post" action = "<?php echo $search; ?>" >
        <label>
		  <h2>Search Teacher : </h2>
		  <input type = "text" name = "teacher_search" >
		  <input type = "submit" name = "search" value = "SEARCH">
        </label>
      </form>		
	</section>
	 
   </header>
  <footer>
   <p class = "copyright">
    &copy 2017 Mubashir Mufti
	</p>
 </body>
</html>
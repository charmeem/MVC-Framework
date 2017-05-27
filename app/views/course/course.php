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
   <h1>Welcome to the Course section of virtual CAMPUS</h1>
    <section>
	    <form id="add_course" method="post" action="<?php echo $add; ?>">
		    <h2>Add Course data</h2>
			<label>
			    Course ID:
			    <input type="text" name="id" />
			</label>
			<label>
			    Course Name:
			    <input type="text" name="name" />
			</label>
			<label>
			    Offered Semester:
			    <input type="text" name="semester" />
			</label>
			<label>
			    Credit Hours:
			    <input type="text" name="credit" />
			</label>
				<input type="submit" Value="Enter" />
		</form>				
    </section>
    <br>

	<!--Adding listAll action -->
	<form id = "list" method = "post" action = "<?php echo $listAll ?>" >
        <label>
		  <input type = "submit" name = "listAll" value = "List All Records">
        </label>
    </form>	
    <br>
	
	  <form id = "search" method = "post" action = "<?php echo $search; ?>" >
        <label>
		  Search Course :
		  <input type = "text" name = "course_search" >
		  <input type = "submit" name = "search" value = "SEARCH">
        </label>
      </form>		
	
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
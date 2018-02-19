<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<meta charset="utf-8" />
<title>A Virtual Campus</title>
<link rel = "stylesheet" href = "{{ css_path }}" /> 
<header>
<h1>Welcome to virtual CAMPUS</h1>
 <p class="tagline">
  A Database for Teachers, Students and Courses.
 </p><!--/.tagline-->
</header>
<div class = "wrap">
    <a href = "{{ student_section }}"> Student Section </a>
    <a href = "{{ teacher_section }}"> Teacher Section </a>
    <a href = "{{ course_section }}">  Course Section </a>
</div>  
<footer>
 <p class = "copyright">
  &copy 2017 Mubashir Mufti
 </p>
</body>
</html>
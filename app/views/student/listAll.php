<?php
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8" />
  <title>A Virtual Campus</title>
  <link rel = "stylesheet" href = <?php echo $data['CSSPath']; ?>
 </head>
 <body>
  
  <header>
   <h3>Complete list of Students Registered at VU</h3>
  </header>
    <a href = "../student">
    <button>Back to Main page</button>
    </a>

 <table>
 <tr>
  <th>Roll_No.</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Semester</th>
  <th>Major</th>
  <th>Grade</th>
 </tr>
 
<?php foreach ($data['list'] as $k => $value) { 
        // foreach ($v as $column => $value) {
  echo "<tr>";
  echo "<td>" . $value['roll_number'] . "</td>";
  echo "<td>" . $value['first_name'] . "</td>";
  echo "<td>" . $value['last_name'] . "</td>";
  echo "<td>" . $value['semester'] . "</td>";
  echo "<td>" . $value['major'] . "</td>";
  echo "<td>" . $value['grade'] . "</td>";
  echo "</tr>";
  
  }
  ?>
  
 
</table> 


  <footer>
   <p class = "copyright">
    &copy 2017 Mubashir Mufti
	</p>
 </body>
</html>
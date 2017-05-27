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
   <h3>Complete list of Courses offered at VU</h3>
  </header>
    <a href = "../student">
    <button>Back to Main page</button>
    </a>

 <table>
 <tr>
  <th><a href = "<?php echo($data['actionPath'] . '/id'); ?>">Course ID</a></th>
  <th><a href = "<?php echo($data['actionPath'] . '/name'); ?>">Course Name</a></th>
  <th><a href = "<?php echo($data['actionPath'] . '/semester'); ?>">Semester</a></th>
  <th><a href = "<?php echo($data['actionPath'] . '/credit'); ?>">Credit hours</a></th>
  <th>Update</th>
 </tr>
 
<?php foreach ($data['list'] as $k => $value) { 
  echo "<tr>";
  echo "<td>" . $value['id'] . "</td>";
  echo "<td>" . $value['name'] . "</td>";
  echo "<td>" . $value['semester'] . "</td>";
  echo "<td>" . $value['credit'] . "</td>";
  
  ?>
  <td><a href = " <?php echo ('../course/edit/' . $value['id']); ?>" >EDIT</a>
   <a href ="<?php echo ('../delete/' . $value['id']); ?> " >DELETE</a></td>
  </tr>
  <?php } ?>
  
</table> 


  <footer>
   <p class = "copyright">
    &copy 2017 Mubashir Mufti
	</p>
 </body>
</html>
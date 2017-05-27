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
   <h3>Complete list of Teachers Record at VU</h3>
  </header>
    <a href = "../teacher">
    <button>Back to Main page</button>
    </a>

 <table>
 <tr>
  <th><a href = "<?php echo($data['actionPath'] . '/first_name'); ?>">First Name</a></th>
  <th><a href = "<?php echo($data['actionPath'] . '/last_name'); ?>">Last Name</a></th>
  <th><a href = "<?php echo($data['actionPath'] . '/education'); ?>">Education</a></th>
  <th><a href = "<?php echo($data['actionPath'] . '/sub1'); ?>">Subject1</a></th>
  <th><a href = "<?php echo($data['actionPath'] . '/sub2'); ?>">Subject2</a></th>
  <th><a href = "<?php echo($data['actionPath'] . '/sub3'); ?>">Subject3</a></th>
  <th>Update</th>
 </tr>
 
<?php foreach ($data['list'] as $k => $value) { 
  echo "<tr>";
  echo "<td>" . $value['first_name'] . "</td>";
  echo "<td>" . $value['last_name'] . "</td>";
  echo "<td>" . $value['education'] . "</td>";
  echo "<td>" . $value['sub1'] . "</td>";
  echo "<td>" . $value['sub2'] . "</td>";
  echo "<td>" . $value['sub3'] . "</td>";
  
  ?>
  <td><a href = " <?php echo ('../edit/' . $value['first_name']); ?>" >Edit</a>
   <a href ="<?php echo ('../delete/' . $value['first_name']); ?> " >Delete</a></td>
  </tr>
  <?php } ?>
  
</table> 


  <footer>
   <p class = "copyright">
    &copy 2017 Mubashir Mufti
	</p>
 </body>
</html>
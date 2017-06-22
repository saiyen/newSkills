    <?php
	
   	// Connect to database
	include("dbconnection.php");

    $sql = "SELECT * FROM post WHERE auteurID='$auteur_id'";
	$stmt = $app['db']->query($sql);
?>

<table style='width:25%'>
	  <tr>
	    <th>Titel</th>
	    <th>Bericht</th> 
	  </tr> 
		  <?php
		  	while ($row = $stmt->fetch()) { 
		  		echo "<tr>";
		  		echo "<td colspan='4'>".$row['title']."</td>";		
				echo "<td colspan='4'>".$row['message']."</td>";
				echo "</tr>";	
		  		}
			echo "</table>";

	$app['db']->close();
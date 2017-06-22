    <?php
   
   	// Connect to database
    include("dbconnection.php");

    $sql = "SELECT * FROM post WHERE postID = '$post_id'";

    $getAuteurID = $app['db']->query($sql);
	$getPostInfo = $app['db']->query($sql);

    while ($row = $getAuteurID->fetch()) { 
		$auteur_id = $row['auteurID'];
    }

    // Use the auteurID from the blog to select the right author ( Doctrine can't do union)
    $sql2 = "SELECT * FROM auteur WHERE auteurID = '$auteur_id'";

	$getAuthorInfo = $app['db']->query($sql2);
?>

<table style='width:25%'>
	  <tr>
	    <th>Titel</th>
	    <th>Bericht</th> 
	    <th>Auteur</th>
	    <th>Leeftijd</th>
	  </tr> 
		  <?php
		  	while ($row = $getPostInfo->fetch()) { 
		  		echo "<tr>";
		  		echo "<td colspan>".$row['title']."</td>";		
				echo "<td colspan>".$row['message']."</td>";

				while ($row = $getAuthorInfo->fetch()) { 
			  		echo "<td colspan>".$row['naam']. "&nbsp;". $row['achternaam']."</td>";		
					echo "<td colspan>".$row['leeftijd']."</td>";
		  		}
				echo "</tr>";	
		  		}
			echo "</table>";

	$app['db']->close();
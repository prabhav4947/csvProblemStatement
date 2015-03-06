<?php

	echo "<html><body><table>";
	
	$final = fopen("final.csv", "r");

		while(($line = fgetcsv($final)) !== false){
			
			echo "<tr>";
			
			foreach($line as $cell){
				
				echo "<td>" . htmlspecialchars($cell) . "</td>";
				
			}
			
			echo "</tr>";
			
		}
	
	fclose($final);
	
	echo "</table></body></html>";

?>
	

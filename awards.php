<?php

	echo "<html><body><table>";
	
	$awards = fopen("csv/awards.csv", "r");

		while(($line = fgetcsv($awards)) !== false){
			
			echo "<tr>";
			
			foreach($line as $cell){
				
				echo "<td>" . htmlspecialchars($cell) . "</td>";
				
			}
			
			echo "</tr>";
			
		}
		
	fclose($awards);
	
	echo "</table></body></html>";

?>
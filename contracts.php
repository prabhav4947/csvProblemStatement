<?php

	echo "<html><body><table>";
	
	$contracts = fopen("csv/contracts.csv", "r");
	
	while(($line = fgetcsv($contracts)) !== false){
		
		echo "<tr>";
		
		foreach($line as $cell){
			
			echo "<td>" . htmlspecialchars($cell) . "</td>";
			
		}
		
		echo "</tr>";
		
	}
	
	fclose($contracts);
	
	echo "</table></body></html>";

?>
<?php

	//Section 1 = open those 2 file and put the content in an array $awards[] and 		$contracts[], so $awards[0] is the first line in awards.csv, $awards[1] is the 		second line in awards.csv, etc, the same in $contracts[].

	$file_a = fopen("csv/awards.csv", "r");
	
	$file_c = fopen("csv/contracts.csv", "r");
	
	while(($data = fgetcsv($file_a)) !== false){
		
		$awards[] = $data; 
		
	}
	
	while(($data = fgetcsv($file_c)) !== false){
		
		$contracts[] = $data;
		
	}		


	for($x=0;$x<count($contracts);$x++)
	{
		
		if($x == 0){
			
			unset($awards[0][0]);
			$line[$x]=array_merge($contracts[0],$awards[0]);//header row
		}
		
		else
		{
			$deadlock = 0;
			for($y=0;$y<=count($awards);$y++)
			{
				if($awards[$y][0] == $contracts[$x][0])
				{
					unset($awards[$y][0]); // removes contract name data
					$line[$x]=array_merge($contracts[$x],$awards[$y]);
					$deadlock = 1;
					
				}
			}
			
			if($deadlock==0){$line[$x]=$contracts[$x];}
			
		}
		
		
	}
	
	
	//Section 3 - Write CSV Final
	
	$fp = fopen('final.csv','w');
	foreach ($line as $fields){ 
	fputcsv($fp, $fields); 
	}
	
	fclose($fp);
	
?>


<?php
//Checks if there is an id in the request
if (isset($_REQUEST["id"]))
{
	//set some variables
	$categoryID = $_REQUEST["id"];	
	$menu_path = './menu/menu.xml';

	//checks for the existence of the menu file
	if (file_exists($menu_path))
	{
		//Parse the xml file as a simple xml object
		$meal_doc = simplexml_load_file('./menu/menu.xml');
		
		//put all of the meals on the menu with a given category ID into the meals object
		$xpathVar = "//menu/meal[category=$categoryID]";
		$meals = $meal_doc->xpath($xpathVar);
		
		//supposed to check if the array is empty... not sure if it does that.
		if ($meals != Array())
		{
			//Starts building up the menu table
			echo "<table class='menu'>\n";
			foreach ($meals as $meal)
			{
				$mealID = $meal->attributes()->id;
				//Need to actually get the meal id...
				echo <<<EOT
				<tr id="meal$mealID" class="mealRow">
					<td class="mealName">$meal->name</td>
					<td class="mealSize">
EOT;
				foreach($meal->xpath("size") AS $size)
				{
					$sizeID = $size->attributes()->id;
					echo <<<EOT
					<table class="priceTable">
						<tr>
							<td class="size">$size</td>
							<td class="price">$size->price</td>
							<td>
								<label id="amount-$mealID-$sizeID">0</label>
								<input class="inc" type="button" value="+" onclick="javascript:incrementOrder($mealID, $sizeID);" />
								<input class="dec" type="button" value="-" onclick="javascript:decrementOrder($mealID, $sizeID)" />	
								<input class="clr" type="button" value="x" onclick="javascript:clearOrder($mealID, $sizeID)" />
								
							</td>	
						</tr>
					</table>
EOT;
				}
				
				echo <<<EOT
					</td>
					</tr>
EOT;
				
			}
			echo "</table>\n";
		}
	} else
	{
		echo "Sorry, the menu file appears to be missing, please visit our <a href='./contact'>Contact Page</a> to let us know!";
	}
} else {
	echo <<<EOT
	Usage of this file:
		mealsByCategory.php?id=<ID of the desired Category>
	
	Please enter an ID and try again or return to the <a href="./categories.php">Categories Page</a> and try again.
EOT;
}

?>
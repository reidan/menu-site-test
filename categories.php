<?php $page = "Menu"; ?>
<?php include "./helpers/header.php" ?>


<div id="categories">

<?php
$categories_doc;
if (file_exists('./menu/categories.xml'))
{
	$categories_doc = simplexml_load_file('./menu/categories.xml');
	
	$categories = $categories_doc->xpath('//categories/category');
	
	foreach ($categories as $category)
	{
		//TODO change to heredoc.
		//print_r($category);
		echo "<div id='category";
		echo $category->attributes()->id; //need to get ID Attribute
		echo "'>\n";
		echo "<a href='javascript:loadCategory(";
		echo $category->attributes()->id; //need to get ID Attribute
		echo ")' class='category'>";
		echo $category->name;
		echo "\n</a>\n</div>\n";
	
	}
	
} else
{
	echo "FAIL";
}
?>
</div>

<div id="mealOptions"> Select a meal category above to begin searching our menu </div>
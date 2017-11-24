<?php

require 'vendor/autoload.php';

use League\ColorExtractor\Color;
use League\ColorExtractor\ColorExtractor;
use League\ColorExtractor\Palette;

$image = 'image.jpg';

$palette = Palette::fromFilename($image);

// $palette is an iterator on colors sorted by pixel count
foreach($palette as $color => $count) {
    // colors are represented by integers
    //echo Color::fromIntToHex($color), ': ', $count, "\n";
}

// it offers some helpers too
$topFive = $palette->getMostUsedColors(5);

//var_dump($topFive);

$colorCount = count($palette);

$blackCount = $palette->getColorCount(Color::fromHexToInt('#000000'));


// an extractor is built from a palette
$extractor = new ColorExtractor($palette);

// it defines an extract method which return the most “representative” colors
$colors = $extractor->extract(5);

//var_dump($colors);

echo "<img src='".$image."' />";

echo "<ul>";

foreach($colors as $c){
	//echo Color::fromIntToHex($c);
	echo "<li>";
	echo '<div style="background:'.Color::fromIntToHex($c).'">'.Color::fromIntToHex($c)."</div>";
	echo "</li>";
}
echo "</ul>";
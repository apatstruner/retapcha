<?php
// generate_images_json.php

$beerDir = __DIR__ . '/images/beer';
$objectsDir = __DIR__ . '/images/objects';

// Get all image files from the directories
$beerImages = glob("$beerDir/*.{jpg,jpeg,png,gif,png}", GLOB_BRACE);
$objectImages = glob("$objectsDir/*.{jpg,jpeg,png,gif,png}", GLOB_BRACE);

// Use relative paths for images
$beerImages = array_map(function($path) use ($beerDir) {
    return 'images/beer/' . basename($path);
}, $beerImages);

$objectImages = array_map(function($path) use ($objectsDir) {
    return 'images/objects/' . basename($path);
}, $objectImages);

// Prepare the image data
$imageData = array(
    'beerImages' => $beerImages,
    'objectImages' => $objectImages
);

// Save the image data to images.json
file_put_contents('images.json', json_encode($imageData, JSON_PRETTY_PRINT));

echo "images.json has been generated.\n";
?>

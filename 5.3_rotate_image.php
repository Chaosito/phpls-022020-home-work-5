<?php
include_once('vendor/autoload.php');
use Intervention\Image\ImageManager;

const RESIZE_W = 200;

$imgPath = $_SERVER['DOCUMENT_ROOT'].'/cat.png';
$wmPath  = $_SERVER['DOCUMENT_ROOT'].'/wm.png';

$manager = new ImageManager(array('driver' => 'imagick'));

$image = $manager->make($imgPath)
    ->rotate(-45)
    ->insert($wmPath, 'bottom-right', 10, 10)
    ->resize(RESIZE_W, null, function ($constraint) {
        $constraint->aspectRatio();
    });

echo $image->response();
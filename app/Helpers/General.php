<?php
/*
 * helper function that auto load(composer.json autoload => files) and then use composer dump-autoload
 *  when project run on server
 *
 */
use Illuminate\Support\Str;

function saveImage($folder, $img){
    $filename = time().$img->hashName();
    $img -> storeAs('/', $filename, $folder);
    $path = $folder . '/' . $filename;
    return $path;
}

function deleteImage($image){
    $photo = Str::after($image, 'assets/');
    $photo = base_path('/dashboard/images/' . $photo);
    unlink($photo);
}

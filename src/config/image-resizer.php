<?php
/**
 * Created by PhpStorm.
 * User: emo
 * Date: 12/6/2018
 * Time: 10:11 AM
 */

return [
    // section 1
    // if full path to image is saved in your table - leave blank, if you save only filename put full path to image here :)
    'images_base_path' => '/',


    // section 2
    // define image sizes. ths sizes myst be defined in ImageTrait too.
    'image_sizes' => [
        'thumbnail' => ['width' => 64 , 'height'=>64],
        'small_avatar' => ['width' => 35 , 'height'=>35],
        'avatar' => ['width' => 120, 'height'=>120],
        'middle' => ['width' => 400, 'height'=>300],
        'cover' => ['width' => 710, 'height'=>400],
    ],


    //section 2
    // define models`s image property
    'object_images' => [
     // examples
//        'User' => 'avatar',
//        'Article' => 'image',
    ],


    //section 3
    //define path to fallback photos
    'fallback_photos' => [
//        'thumbnail' => 'public_path_to_image_with_suitable_size',
//        'small_avatar' => '',
//        'avatar' => '',
//        'middle' => '',
//        'cover' => '',
    ],

    'default_fallback_photo' => 'publick_path_to_default_fallback_photo',
];
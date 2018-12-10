<?php
/**
 * Created by PhpStorm.
 * User: emo
 * Date: 12/6/2018
 * Time: 10:11 AM
 */

return [

    // define paths
    'images_base_path' => '/images/',

    // define image sizes. ths sizes myst be defined in ImageTrait too.
    'image_sizes' => [
        'thumbnail' => ['width' => 64 , 'height'=>64],
        'small_avatar' => ['width' => 35 , 'height'=>35],
        'avatar' => ['width' => 120, 'height'=>120],
        'middle' => ['width' => 400, 'height'=>300],
        'cover' => ['width' => 710, 'height'=>400],
    ],

    // define models`s image property
    'object_images' => [
     // examples
//        'User' => 'avatar',
//        'Article' => 'image',
    ],
];
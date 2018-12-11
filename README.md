# image-resizer
resize existing images on server and save it in custom directory. You can use them later only with calling model property

This version works onli with photos stored in public directory




## Install package
``` bash
composer require emil-zhivkov/image-resizer @dev


```

config/app.php
``` bash
 EmilZhivkov\ImageResizer\ImageResizerServiceProvider::class,
```

## Publishing configuration file
``` bash
php artisan vendor:publish
```



## Configuration file

Section 1

if you store in your database only filename you must define public path to your photo directory
Example: 
image field: avatar.jpg
'images_base_path' => 'public_path_to_image_directory',

Or
image field: images/users/avatar.jpg

'images_base_path' => '/'



Section 2

You can change image sizes here. Aspect ratio keep the same as original photo
You can define sizes here. And you can add you own type of size but must to extend ImageTrait and add new mutator there.


Section 3

Define model image property here
Example

'User' => 'avatar',

'Article' => 'featured_image',

'Product' => 'image'

etc.


thats all folks, enjoy ! 

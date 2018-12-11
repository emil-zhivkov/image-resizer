<?php
/**
 * Created by PhpStorm.
 * User: emo
 * Date: 12/6/2018
 * Time: 10:09 AM
 */

namespace EmilZhivkov\ImageResizer\Facades;
use Illuminate\Support\Facades\Facade;

class ImageResize  extends Facade
{




    static function resizePhoto($fileName, $images_type_size = null)
    {

        $base_path = config('image-resizer.images_base_path');
        $array = explode('/', $fileName);
        $fileName = end($array);
        array_pop($array);
        $filePath = public_path() . $base_path . implode('/', $array) . '/';
        $realFilePath = $base_path . implode('/', $array) . '/';
        $realResizedFilePath = $base_path . implode('/', $array) . '/' . $images_type_size . '/';
        $resized_file_path = $filePath . $images_type_size . '/';

        if (!$images_type_size) {
            return $realFilePath . $fileName;
        }


        //get sizes
        $sizes = config('image-resizer.image_sizes');
        if ($images_type_size and array_key_exists($images_type_size, $sizes)) {
            $size = $sizes[$images_type_size];
        } else {
            $size = $sizes['original'];
        }
        $width = $size['width'];
        $height = $size['height'];

        // check for existing
        if (file_exists($resized_file_path . $fileName)) {
            return $realResizedFilePath . $fileName;
        }

        //prepare folder
        self::prepareFolders($filePath, $images_type_size);

        // image intervention
        if (!file_exists($filePath . $fileName)) {
            return self::defaultPhoto($images_type_size);
        }
        $img = \Image::make($filePath . $fileName);
        $originalWidth = $img->width();
        $originalHeight = $img->height();

        if (($width) and ($height)) {
            if ($originalWidth >= $originalHeight) {
                $img->resize(null, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });
            } else {
                $img->resize($width, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
        }
        if (($width) and (!$height)) {
            $img->resize($width, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        if ((!$width) and ($height)) {

            $img->resize(null, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        $img->save($resized_file_path . $fileName);

        return $realResizedFilePath . $fileName;
    }


    public static function getResizedImage($object, $images_type_size = null)
    {
        $model_name = class_basename($object);

        if (array_key_exists($model_name, config('image-resizer.object_images'))) {
            $column = config('image-resizer.object_images.' . $model_name);
            $filename = $object->$column;
            if (!empty($filename)) {
                return self::resizePhoto($filename, $images_type_size);
            }
            return self::defaultPhoto($images_type_size);
        }
        return self::defaultPhoto($images_type_size);
    }


    private static function defaultPhoto($type = null)
    {
        if($type){
            return '/images/' . $type . '_default.jpg';
        }
        return '/images/cover_default.jpg';
    }

    private static function prepareFolders($file_path, $dirname)
    {

        $general_path = $file_path . $dirname;
        if (!\File::exists($general_path)) {
            ;
            mkdir($general_path, 0775, true);
        }
    }

    public static function unlinkPhotos($path,$filename)
    {
        $directories = config('images.image_sizes');
        if (file_exists($path.$filename)){
            unlink($path.$filename);
        }
        foreach ($directories as $dir => $none){
            if (file_exists($path.$dir.'/'.$filename)){
                unlink($path.$dir.'/'.$filename);
            }
        }
    }
}
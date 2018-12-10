<?php
/**
 * Created by PhpStorm.
 * User: Emo
 * Date: 7/4/2018
 * Time: 5:17 PM
 */

namespace EmilZhivkov\ImageResizer\Traits;

use EmilZhivkov\ImageResizer\Facades\ImageResize;

trait ImageTrait
{
    public function getAvatarImageAttribute()
    {
        return ImageResize::getResizedImage($this, 'avatar');
    }
    public function getSmallAvatarImageAttribute()
    {
        return ImageResize::getResizedImage($this, 'small_avatar');
    }
     public function getThumbnailImageAttribute()
    {
        return ImageResize::getResizedImage($this, 'thumbnail');
    }
     public function getMiddleImageAttribute()
    {
        return ImageResize::getResizedImage($this, 'middle');
    }
     public function getCoverImageAttribute()
    {
        return ImageResize::getResizedImage($this, 'cover');
    }
    public function getOriginalImageAttribute()
    {
        return ImageResize::getResizedImage($this);
    }

}
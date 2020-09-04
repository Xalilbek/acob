<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    public function images(){
        return $this->hasMany(DesignImage::class)->orderBy('order');
    }

    public function getMainImage(){
        $imageURL = "https://i.picsum.photos/id/866/400/300.jpg";

        if (isset($this->images[0])) {
            $imageURL = url('assets/images/projects/'.$this->images[0]['image']);
        }
        return $imageURL;
    }
}

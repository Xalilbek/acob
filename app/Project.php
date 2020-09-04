<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function projectImages(){
        return $this->hasMany(ProjectImage::class)->orderBy('order');
    }

    public function projectSketches(){
        return $this->hasMany(ProjectSketch::class);
    }

    public function projectDescriptions(){
        return $this->hasMany(ProjectDescription::class);
    }
}

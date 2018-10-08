<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Project extends Model
{
    use Softdeletes;

    protected $fillable = ['*'];
    protected $dates = ['deleted_at'];

    public static function getActiveProjectAttribute($val = 1){
        return self::where('id', '>', $val)->get();
    }

    public function capitalizeNameFirstLetter(){
        $name = $this->attributes['name'];
        $name = ucfirst($name);
        $this->attributes['name'] = $name;
        //return $name;
    }

    public function project_metadata(){
        return $this->hasOne('App\ProjectMetadata');
    }
}

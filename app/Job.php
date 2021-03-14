<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //Table Name 
    protected $table = "jobs";
    //Primary Key/ID
    public $primaryKey = "id";
    //Timestamps
    public $timestamps = true;

    public function employer(){
        return $this->belongsTo('App\Employer');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTemplate extends Model
{
    //
    protected $table = 'events_templates';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'events_id','templates_id'
    ];
}

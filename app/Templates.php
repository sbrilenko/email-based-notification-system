<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Templates extends Model
{
    //

    protected $table = 'templates';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'subject', 'template', 'user_changed'
    ];

    /**
     * Get the event
     */
    public function events()
    {
        return $this->belongsToMany(Events::class);
    }

}

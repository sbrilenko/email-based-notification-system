<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    //
    protected $table = 'events';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get the template
     */
    public function templates()
    {
        return $this->belongsToMany(Templates::class);
    }
}

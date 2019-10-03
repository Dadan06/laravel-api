<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Privilege extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'category'];

    /**
     * @return BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
}

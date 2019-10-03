<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    protected $fillable = ['name'];

    /**
     * @return BelongsToMany
     */
    public function privileges()
    {
        return $this->belongsToMany('App\Models\Privilege', 'roles_privileges');
    }
}

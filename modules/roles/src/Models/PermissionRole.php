<?php

namespace Blit\Roles\Models;

use Blit\Domains\Models\Permission;
use Illuminate\Database\Eloquent\Model;


class PermissionRole extends Model
{
    protected $fillable = [
        'role_id', 'permission_id', 'active'
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function permission(){
        return $this->belongsTo(Permission::class);
    }
}

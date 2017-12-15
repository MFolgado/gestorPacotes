<?php

namespace Blit\Roles\Models;


use Blit\Domains\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Role extends Model {

    protected $fillable = [
        'account_id', 'name', 'description'
    ];


    protected static function boot()
    {
        parent::boot();
//        static::addGlobalScope(new \Blit\Scopes\TenanScope());
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_roles', 'role_id', 'permission_id')->withPivot('active');
    }


//    public function permissionRoles(){
//        return $this->hasMany('Blit\Roles\Models\PermissionRole');
//    }
//




}
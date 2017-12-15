<?php

namespace Blit\Accounts\Models;


use Blit\Roles\Models\Role;
use Blit\Scopes\TenanScope;
use Blit\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use \Illuminate\Database\Eloquent\Builder;

class Account extends Model {

    protected $fillable = [
        'short_name', 'full_name', 'cnpj_cpf', 'active', 'email'
    ];


    public static function boot(){

        parent::boot();

        static::created(function($model)
        {
            $role = [
                'account_id' => $model->id,
                'name' => 'admin',
                'description' => 'administrador do sistema'
            ];

            Role::firstOrCreate($role);

            $data = [
                'account_id' => $model->id,
                'name' => 'Admin',
                'email' => $model->email,
                'password' => bcrypt('123123'),
            ];

            User::firstOrCreate($data);
        });

    }

    public function roles()
    {
        return $this->hasMany(Role::class);
    }



}
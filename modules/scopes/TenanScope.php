<?php

namespace Blit\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class TenanScope implements Scope{

    public function apply(Builder $builder, Model $model)
    {
        $account_id = Auth::user()->account_id;
        $builder->where('account_id', $account_id);
    }

}
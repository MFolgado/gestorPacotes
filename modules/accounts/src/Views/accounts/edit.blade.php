@extends('layouts.app')

@section('content')
    <a href="{{ route('accounts.index') }}"><button class="btn btn-default">{{ trans('BlitAccounts::accounts.route-back') }}</button></a>
    <hr/>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('BlitAccounts::accounts.accounts') }}</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('accounts.update', $account->id) }}">

                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="short_name" class="col-md-4 control-label">{{ trans('BlitAccounts::accounts.fields.short_name') }}. <span style="color: red;">*</span> </label>
                    <div class="col-md-2">
                        <input id="short_name" name="short_name" type="text" class="form-control" value="{{ $account->short_name }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="full_name" class="col-md-4 control-label">{{ trans('BlitAccounts::accounts.fields.full_name') }}</label>
                    <div class="col-md-2">
                        <input id="full_name" name="full_name" type="text" class="form-control" value="{{ $account->full_name }}" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">{{ trans('BlitAccounts::accounts.fields.email') }}</label>
                    <div class="col-md-2">
                        <input id="email" name="email" type="text" class="form-control" value="{{ $account->email }}" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="cnpj_cpf" class="col-md-4 control-label">{{ trans('BlitAccounts::accounts.fields.cnpj_cpf') }}</label>
                    <div class="col-md-2">
                        <input id="cnpj_cpf" name="cnpj_cpf" type="text" class="form-control" value="{{ $account->cnpj_cpf }}" >
                    </div>
                </div>

                <div class="form-group ">
                    <label for="active" class="col-md-4 control-label">
                        {{ trans('BlitAccounts::accounts.fields.active') }}
                    </label>
                    <div class="col-md-2">
                        <input type="checkbox" id="active" name="active" value="1" @if($account->active) checked @endif>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            {{ trans('BlitAccounts::accounts.submit') }}
                        </button>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection
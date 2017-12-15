@extends('layouts.app')

@section('content')
    <a href="{{ route('roles.index') }}"><button class="btn btn-default">{{ trans('BlitRoles::roles.route-back') }}</button></a>
    <hr/>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('BlitRoles::roles.roles') }}</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('roles.store') }}">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="account_id" class="col-md-4 control-label">{{ trans('BlitRoles::roles.fields.account_id') }}. <span style="color: red;">*</span> </label>
                    <div class="col-md-2">
                        <select name="account_id" id="account_id" class="form-control">

                            @foreach($accounts as $account)
                                <option value="{{$account->id}}">
                                    {{$account->short_name}}
                                </option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">{{ trans('BlitRoles::roles.fields.name') }}. <span style="color: red;">*</span> </label>
                    <div class="col-md-2">
                        <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-md-4 control-label">{{ trans('BlitRoles::roles.fields.description') }}</label>
                    <div class="col-md-2">
                        <input id="description" name="description" type="text" class="form-control" value="{{ old('full_name') }}" >
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            {{ trans('BlitRoles::roles.submit') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
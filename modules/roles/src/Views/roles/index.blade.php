@extends('layouts.app')

@section('content')
    <a href="/home"><button class="btn btn-default">{{ trans('BlitRoles::roles.route-back') }}</button></a>
    <a href="{{ route('roles.create') }}"><button class="btn btn-default">{{ trans('BlitRoles::roles.new-register') }}</button></a>
    <hr/>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('BlitRoles::roles.roles') }}</h3>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ trans('BlitRoles::roles.table-header.account_id') }}</th>
                    <th>{{ trans('BlitRoles::roles.table-header.name') }}</th>
                    <th>{{ trans('BlitRoles::roles.table-header.description') }}</th>
                    <th>{{ trans('BlitRoles::roles.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $obj)
                    <tr>
                        <td>{{ $obj->id }}</td>
                        <td>{{ $obj->account_id }}</td>
                        <td>{{ $obj->name }}</td>
                        <td>{{ $obj->description }}</td>
                        <td>
                            <form action="{{ route('roles.destroy',$obj->id) }}" method="POST">
                                <div class="btn-group btn-group-sm">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-sm btn-default">{{ trans('BlitRoles::roles.delete') }}</button>
                                    <a href="{{ route('roles.edit',[$obj->id]) }}"><button type="button" class="btn btn-sm btn-default">{{ trans('BlitRoles::roles.edit') }}</button></a>
                                    <a href="{{ route('role.permissions',[$obj->id]) }}"><button type="button" class="btn btn-sm btn-default">{{ trans('BlitRoles::roles.permissions') }}</button></a>

                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {!! $roles->render() !!}
        </div>
    </div>
@endsection
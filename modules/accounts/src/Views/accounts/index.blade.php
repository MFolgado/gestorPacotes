@extends('layouts.app')

@section('content')
    <a href="/home"><button class="btn btn-default">{{ trans('BlitAccounts::accounts.route-back') }}</button></a>
    <a href="{{ route('accounts.create') }}"><button class="btn btn-default">{{ trans('BlitAccounts::accounts.new-register') }}</button></a>
    <hr/>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('BlitAccounts::accounts.accounts') }}</h3>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ trans('BlitAccounts::accounts.table-header.short_name') }}</th>
                    <th>{{ trans('BlitAccounts::accounts.table-header.full_name') }}</th>
                    <th>{{ trans('BlitAccounts::accounts.table-header.cnpj_cpf') }}</th>
                    <th>{{ trans('BlitAccounts::accounts.table-header.active') }}</th>
                    <th>{{ trans('BlitAccounts::accounts.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($accounts as $obj)
                    <tr>
                        <td>{{ $obj->id }}</td>
                        <td>{{ $obj->short_name }}</td>
                        <td>{{ $obj->full_name }}</td>
                        <td>{{ $obj->cnpj_cpf }}</td>
                        <td>{{ $obj->active ? 'Sim' : 'Não' }}</td>

                        <td>
                            <form action="{{ route('accounts.destroy',$obj->id) }}" method="POST">
                                <div class="btn-group btn-group-sm">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-sm btn-default">{{ trans('BlitAccounts::accounts.delete') }}</button>
                                    <a href="{{ route('accounts.edit',[$obj->id]) }}"><button type="button" class="btn btn-sm btn-default">{{ trans('BlitAccounts::accounts.edit') }}</button></a>
                                    <a href="{{ route('accounts.role', [$obj->id]) }}"><button type="button" class="btn btn-sm btn-default">{{ trans('BlitAccounts::accounts.roles') }}</button></a>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {!! $accounts->render() !!}
        </div>
    </div>
@endsection
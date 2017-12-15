@extends('layouts.app')

@section('content')
    <a href="{{ route('accounts.index') }}"><button class="btn btn-default">{{ trans('BlitDomains::domains.route-back') }}</button></a>
    <a href="{{ route('roles.create') }}"><button class="btn btn-default">{{ trans('BlitAccounts::accounts.new-register') }}</button></a>
    <hr/>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('BlitAccounts::accounts.roles') }} - {{$account->short_name}}</h3>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ trans('BlitAccounts::accounts.role.name') }}</th>
                    <th>{{ trans('BlitAccounts::accounts.role.description') }}</th>
                    {{--<th>{{ trans('BlitAccounts::accounts.action') }}</th>--}}
                </tr>
                </thead>
                <tbody>
                @forelse($account->roles()->get() as $obj)
                    <tr>
                        <td>{{ $obj->id }}</td>
                        <td>{{ $obj->name }}</td>
                        <td>{{ $obj->description }}</td>
                        {{--<td>{{ $obj->cnpj_cpf }}</td>--}}
                        {{--<td>{{ $obj->active ? 'Sim' : 'Não' }}</td>--}}

                        {{--<td>--}}
                            {{--<form action="{{ route('accounts.destroy',$obj->id) }}" method="POST">--}}
                                {{--<div class="btn-group btn-group-sm">--}}
                                    {{--<input type="hidden" name="_method" value="DELETE">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--<button type="submit" class="btn btn-sm btn-default">{{ trans('BlitAccounts::accounts.delete') }}</button>--}}
                                    {{--<a href="{{ route('accounts.edit',[$obj->id]) }}"><button type="button" class="btn btn-sm btn-default">{{ trans('BlitAccounts::accounts.edit') }}</button></a>--}}
                                    {{--<a href="{{ route('accounts.role') }}"><button type="button" class="btn btn-sm btn-default">{{ trans('BlitAccounts::accounts.roles') }}</button></a>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</td>--}}
                    </tr>

                @empty
                    <tr>
                        <td> <b style="color: red;">Não há papeis cadastrados </b> </td>
                    </tr>
                @endforelse

                </tbody>
            </table>

        </div>
    </div>
@endsection
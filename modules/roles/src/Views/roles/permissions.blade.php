@extends('layouts.app')

@section('content')

    <script
            src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"></script>
    <a href="/roles"><button class="btn btn-default">{{ trans('BlitRoles::roles.route-back') }}</button></a>
{{--    <a href="{{ route('roles.create') }}"><button class="btn btn-default">{{ trans('BlitRoles::roles.new-register') }}</button></a>--}}
    <hr/>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('BlitRoles::roles.permissions') }}</h3>
        </div>
        <div class="panel-body">
            @foreach($domains as $domain)
                <div class="panel panel-default col-md-3" style="margin-right: 1px;">
                    <div class="panel-heading">
                        {{ $domain->name }}
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                        @foreach($permissions as $key => $permission)
                            @if($domain->id == $permission->domain_id)
                                <li class="list-group-item">
                                    {{$permission->name}}
                                    @if($role->permissions()->find($permission->id))
                                        <input checked  type="checkbox" id="toogle_permission_{{$permission->id}}" onchange="toogle('{{$role->id}}', '{{$permission->id}}')"  name="toogle_permission" class="pull-right"/>
                                    @else
                                        <input  type="checkbox" id="toogle_permission_{{$permission->id}}" onchange="toogle('{{$role->id}}', '{{$permission->id}}')"  name="toogle_permission" class="pull-right"/>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        var toogle = function(role, permission){

            url = '/permissions/toogle';
            data = {
                role_id : role,
                permission_id : permission,
                _token : '{{ csrf_token() }}'
            };


            console.log(data);
            $.ajax({
                url : url,
                data : data,
                method : 'POST',
                success : function(data){
                    data = JSON.parse(data);
                    console.log(data);
                }
            });



        };
    </script>
@endsection


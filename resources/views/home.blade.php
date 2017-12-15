@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-md-2 col-sm-12">
            @can('user.show')
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="/accounts"> Account </a>
                </li>
                <li class="list-group-item">
                    <a href="/users"> User </a>
                </li>
                <li class="list-group-item">
                    <a href="/domains"> Domain </a>
                </li>
                <li class="list-group-item">
                    <a href="/roles"> Role </a>
                </li>
            </ul>
            @endcan
        </div>

        <div class="col-md-10 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

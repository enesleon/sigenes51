@extends('layouts.generals.main_template')

@section('page_title')
    Usuarios
@endsection

@section('title')
    Usuarios
@endsection

@section('angular_controller')
    <div data-ng-controller="UsersController as users">
@endsection

@section('filters')
    <nit-advanced-searchbox
            ng-model="searchInput"
            parameters="availableSearchParams"
            placeholder="Search...">
    </nit-advanced-searchbox>
@endsection

@section('button_delete')
@endsection

@section('buttons')
    <a class="btn btn-success" href="{{ route('users.create') }}"> <i class="fa fa-user-plus"></i> Crear</a>
@endsection

@section('body_page')
        <div class="row">
            @include('templates.admin.users.partials.table')
            <div class="text-center">
                <dir-pagination-controls
                        max-size="15"
                        direction-links="true"
                        boundary-links="true" >
                </dir-pagination-controls>
            </div>
        </div>
        @include('templates.admin.users.partials.show')
        @include('templates.admin.users.partials.edit')
        @include('templates.admin.users.partials.delete')
    </div>
@endsection

@section('end_angular_controller')
    </div>
@endsection
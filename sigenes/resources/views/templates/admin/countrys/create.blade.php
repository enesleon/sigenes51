@extends('layouts.generals.main_template')

@section('page_title')
    @lang('countrys.create_country')
@endsection

@section('title')
    @lang('countrys.create_country')
@endsection

@section('angular_controller')
    <div data-ng-controller="CountrysController as countrys">
        @endsection

        @section('buttons')
            <a class="btn btn-info" data-ng-click="save(country)"><i class="fa fa-floppy-o"></i>    @lang('generals.save')</a>
            <a class="btn btn-danger" href="{{ route('countrys.index') }}"><i class="fa fa-times"></i> @lang('generals.cancel')</a>
        @endsection

        @section('body_page')
            @include('templates.admin.countrys.partials.inputs')
        @endsection

        @section('end_angular_controller')
    </div>
@endsection
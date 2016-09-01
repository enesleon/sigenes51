@extends('layouts.generals.main_template')

@section('page_title')
    @lang('countrys.title')
@endsection

@section('title')
    @lang('countrys.title')
@endsection

@section('angular_controller')
    <div data-ng-controller="CountrysController as countrys">
        @endsection

        @section('filters')
            <nit-advanced-searchbox
                    ng-model="searchInput"
                    parameters="availableSearchParams"
                    placeholder="{{trans('generals.search')}}">
            </nit-advanced-searchbox>
        @endsection

        @section('button_delete')
        @endsection

        @section('buttons')
            <a class="btn btn-success" href="{{ route('countrys.create') }}"> <i
                        class="fa fa-fort-awesome"></i> @lang('generals.create')</a>
        @endsection

        @section('body_page')
            <div class="row">
                @include('templates.admin.countrys.partials.table')
                <div class="text-center">
                    <dir-pagination-controls
                            max-size="15"
                            direction-links="true"
                            boundary-links="true" >
                    </dir-pagination-controls>
                </div>
            </div>
    </div>
    @include('templates.admin.countrys.partials.show')
    @include('templates.admin.countrys.partials.edit')
    @include('templates.admin.countrys.partials.delete')
    </div>
    @endsection
    @section('end_angular_controller')
    </div>
@endsection
@extends('layouts.generals.main_template')

@section('page_title')
    {{trans('schoolrecords.validations')}}
@endsection

@section('title')
    {{trans('schoolrecords.title')}}
@endsection

@section('angular_controller')
    <div data-ng-controller="schoolrecordAdminCtrl">
@endsection

@section('filters')
    <nit-advanced-searchbox
            ng-model="searchInput"
            parameters="availableSearchParams"
            placeholder="Search...">
    </nit-advanced-searchbox>
@endsection

@section('body_page')
    <div class="row">
        <div ng-init="showData()"></div>  
        
        @include('templates.admin.school_records.partials.dataTable')
        <div class="text-center">
            <dir-pagination-controls 
            max-size="15" 
            direction-links="true" 
            boundary-links="true" >
            </dir-pagination-controls>
        </div>
    </div>
    @include('templates.admin.school_records.partials.validate')
    @include('templates.admin.school_records.partials.delete')
    @include('templates.admin.school_records.partials.showimg')
    </div> 
@endsection

@section('end_angular_controller')
    </div>
@endsection
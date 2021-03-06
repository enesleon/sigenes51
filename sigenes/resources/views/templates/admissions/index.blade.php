@extends('layouts.app')


@section('extra_css')
    <style>
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        [ng-cloak]
        {
            display: none !important;
        }
    </style>
@endsection


@section('content')
    <div class="row" style="padding-top: 20px">
        <div class="col-lg-12">
            <div data-ng-controller="AdmissionController as admissions">
                <div class="col-lg-12">
                    <div class="col-lg-5 col-md-6 col-xs-6 col-sm-6">
                        <center>
                            <img src="{{ asset(env('LOGO_ENESAZULFULL')) }}" width="200px" height="100px">
                        </center>
                    </div>
                    <div class="col-lg-7 col-md-6 col-xs-6 col-sm-6" style="height: 100px;">
                        <h1 class="text-left" style="padding-top: 25px">{{ trans('admissions.title') }}</h1>
                    </div>
                </div>
                @include('templates.admissions.partials.menu_steps')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2
                                col-md-8 col-md-offset-2
                                col-sm-12
                                col-xs-12">
                                <div data-ng-show="step == 1">
                                    @include('templates.admissions.partials.general_step')
                                </div>
                                <div data-ng-show="step == 2">
                                    @include('templates.admissions.partials.personal_information')
                                </div>
                                <div data-ng-show="step == 3">
                                    @include('templates.admissions.partials.address_information')
                                </div>
                                <div data-ng-show="step == 4">
                                    @include('templates.admissions.partials.school_graduation')
                                </div>
                                <div data-ng-show="step == 5">
                                    @include('templates.admissions.partials.documentation')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.generals.main_template')

@section('page_title')
    {{ trans('applicants.title') }}
@endsection

@section('title')
    {{ trans('applicants.title') }}  @{{ applicant.name }} @{{ applicant.firstlastname }} @{{ applicant.secondlastname }}
@endsection

@section('angular_controller')
    <div data-ng-controller="ShowApplicantsController as applicant">
        @endsection

        @section('filters')
        @endsection

        @section('buttons')
            <a class="btn btn-success"><i class="fa fa-floppy-o"></i> Aceptar aspirante</a>
        @endsection

        @section('body_page')
            <div class="row">
                <div class="col-lg-5 col-md-5" style="height:795px; overflow-y:auto;">
                    <div class="column">
                        <div class="list-group">
                            <a href="#" class="list-group-item disabled">
                                <h1><i class="user icon"></i> {{ trans('admissions.personal_information') }}</h1>
                            </a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.account_number') }}:</strong> @{{ applicant.account_number }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.name') }}:</strong> @{{ applicant.name }} @{{ applicant.firstlastname }} @{{ applicant.secondlastname }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.curp') }}:</strong> @{{ applicant.curp }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.rfc') }}: </strong> @{{ applicant.rfc }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.birthdate') }}: </strong> @{{ applicant.birthdate }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.email') }}: </strong> @{{ applicant.email }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.nationality') }}: </strong> @{{ applicant.nationality }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.telephone') }}: </strong> @{{ applicant.telephone }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.celphone') }}: </strong> @{{ applicant.celphone }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.nss') }}: </strong> @{{ applicant.nss }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.maritalstatus') }}: </strong> @{{ applicant.maritalstatus }}</a>
                        </div>
                        <div class="list-group">
                            <a href="#" class="list-group-item disabled">
                                <h1><i class="building icon"></i> {{ trans('admissions.address') }}</h1>
                            </a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.street') }}:</strong> @{{ applicant.street }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.num_int') }}:</strong> @{{ applicant.num_int }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.num_ext') }}: </strong> @{{ applicant.num_ext }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.colony') }}: </strong> @{{ applicant.colony }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.zip') }}: </strong> @{{ applicant.zip }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.country') }}: </strong> @{{ country }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.state') }}: </strong> @{{ state }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.city') }}: </strong> @{{ city }}</a>
                        </div>
                        <div class="list-group">
                            <a href="#" class="list-group-item disabled">
                                <h1><i class="student icon"></i> {{ trans('admissions.school_graduation') }}</h1>
                            </a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.school_name') }}:</strong> @{{ applicant.school_name }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.specialty') }}:</strong> @{{ applicant.specialty }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.month_start') }}: </strong> @{{ applicant.month_start }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.year_start') }}: </strong> @{{ applicant.year_start }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.month_end') }}: </strong> @{{ applicant.month_end }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.year_end') }}: </strong> @{{ applicant.year_end }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.average') }}: </strong> @{{ applicant.average }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.career') }}: </strong> @{{ career }}</a>
                            <a href="#" class="list-group-item"><strong>{{ trans('admissions.observations') }}: </strong> @{{ applicant.observations }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="column">
                        <div class="col-lg-9">
                            <span ng-bind-html="document_example | renderHTMLCorrectly"></span>
                        </div>
                        <div class="col-lg-3">
                            <h1>Documentos</h1>
                            <ul class="list-group">
                                <a ng-click="changeDocument(0)" class="list-group-item" target="documentView">Acta de nacimiento</a>
                                <a ng-click="changeDocument(1)" class="list-group-item" target="documentView">Curp</a>
                                <a ng-click="changeDocument(2)" class="list-group-item" target="documentView">Certificado de bachillerato</a>
                                <a ng-click="changeDocument(3)" class="list-group-item" target="documentView">Orden de pago</a>
                                <a ng-click="changeDocument(4)" class="list-group-item" target="documentView">Horario de clases</a>
                                <a ng-click="changeDocument(5)" class="list-group-item" target="documentView">Carta de asignación</a>
                                <a ng-click="changeDocument(6)" class="list-group-item" target="documentView">Acuse DGAE o Carta compromiso</a>
                                <a ng-click="changeDocument(7)" class="list-group-item" target="documentView">Formato IMSS</a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection

@section('end_angular_controller')
    </div>
@endsection
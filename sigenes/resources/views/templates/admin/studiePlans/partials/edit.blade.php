<div class="ui modal" id="edit">
    <i class="close icon"></i>
    <div class="header">
        @{{ studiePlan.name }}
    </div>
    <div class="content">
        @include('templates.admin.studieplans.partials.inputs')
    </div>
    <div class="actions">*
        <div class="row">
            <div class="col-lg-6 col-lg-offset-6">
                <a class="btn btn-danger deny"><i class="fa fa-times"></i>  @lang('generals.cancel')</a>
                <a class="btn btn-info" data-ng-click="editPlan(studiePlan)"><i class="fa fa-floppy-o"></i> @lang('generals.save')</a>
            </div>
        </div>
    </div>
</div>
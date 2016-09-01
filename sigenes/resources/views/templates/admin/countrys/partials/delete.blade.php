<div class="ui basic modal" id="delete">
    <i class="close icon"></i>
    <div class="header">
        @lang('generals.delete')
    </div>
    <div class="image content">
        <div class="image">
            <i class="user icon"></i>
        </div>
        <div class="description">
            <p>@lang('generals.really_remove') @lang('countrys.country') @{{ country.name }} </p>
        </div>
    </div>
    <div class="actions">
        <div class="two fluid ui inverted buttons">
            <div class="ui red basic inverted button deny">
                <i class="remove icon"></i>
                No
            </div>
            <div class="ui green basic inverted button" data-ng-click="deleteCountry(country)">
                <i class="checkmark icon"></i>
                @lang('generals.yes')
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<table class="table table-hover">
		<tr>
			<th >
				{{trans('career.enes')}}
			</th>
			<th ng-click="sort('key')">
				{{trans('career.keycareer')}}
				<span class="glyphicon sort-icon" ng-show="sortKey=='key'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
			</th>
			<th ng-click="sort('name')">
				{{trans('career.name')}}
				<span class="glyphicon sort-icon" ng-show="sortKey=='name'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
			</th>
			<th ng-click="sort('description')">
				{{trans('career.description')}}
				<span class="glyphicon sort-icon" ng-show="sortKey=='description'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
			</th>
			<th>
				{{trans('career.control')}}
			</th>
		</tr>
		<tr data-dir-paginate="entity in datacareer | orderBy:sortKey:reverse | filter:searchInput |itemsPerPage:15">
			<td>@{{ entity.father_campus}}</td>
			<td>@{{ entity.key}}</td>
			<td>@{{ entity.	name}}</td>
			<td>@{{ entity.description}}</td>
			<td>
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
						<a ng-click="editCareer(entity)" ><span class="glyphicon glyphicon-edit" data-toggle="tooltip" title="{{trans('career.ctrledit')}}"></span></a>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
						<a ng-click="filtroArea(entity.id)"><span class="fa fa-eye" data-toggle="tooltip" title="{{trans('career.ctrlshow')}}"></span></a>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        	<a data-ng-click="createArea(entity.id)" ><span class="fa fa-plus-circle" data-toggle="tooltip" title="{{trans('career.ctrlarea')}}"></span></a>
                    	</div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
						<a ng-click="deleteCareer(entity)"><span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="{{trans('career.ctrldelete')}}"></span></a>
					</div>
				</div>
			</td>
		</tr>
	</table>
</div>
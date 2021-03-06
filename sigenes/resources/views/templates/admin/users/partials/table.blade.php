<table class="table table-hover">
    <tr>
        <th ng-click="sort('name')">Nombre
            <span class="glyphicon sort-icon" ng-show="sortKey=='name'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
        </th>
        <th ng-click="sort('email')">
            Correo
            <span class="glyphicon sort-icon" ng-show="sortKey=='email'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
        </th>
        <th ng-click="sort('rfc')">
            RFC
            <span class="glyphicon sort-icon" ng-show="sortKey=='rfc'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
        </th>
        <th width="10%">Controllers</th>
    </tr>
    <tr data-dir-paginate="user in users | orderBy:sortKey:reverse | filter:searchInput |itemsPerPage:15">
        <td>@{{ user.name }}</td>
        <td>@{{ user.email }}</td>
        <td>@{{ user.rfc }}</td>
        <td>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                    <a data-ng-click="showUser(user)"><i class="fa fa-eye"></i></a>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                    <a data-ng-click="editUserModal(user)"><i class="fa fa-pencil-square-o"></i></a>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                    <a data-ng-click="deleteUserModal(user)"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </td>
    </tr>
</table>
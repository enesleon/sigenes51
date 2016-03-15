
<!-- JavaScripts Libraries -->

<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/angular/angular.js') }}"></script>
<script src="{{ asset('js/script/lib/angular-resource.js') }}"></script>
<script src="{{ asset('js/script/lib/angular-route.min.js') }}"></script>
<script src="{{ asset('js/script/lib/angular-animate.min.js') }}"></script>
<script src="{{ asset('js/script/lib/ui-bootstrap-112.min.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>        
<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.4.0/lang/en-gb.js"></script>                
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.0.0/js/bootstrap-datetimepicker.min.js"></script> 
<script src="{{ asset('bower_components/angular-advanced-searchbox/dist/angular-advanced-searchbox-tpls.min.js') }}"></script>
<script src="{{ asset('bower_components/angularUtils-pagination/dirPagination.js') }}"></script>
<script src="{{ asset('bower_components/angular-ui-notification/dist/angular-ui-notification.min.js') }}"></script>
<script src="{{ asset('bower_components/angular-base64-upload/dist/angular-base64-upload.js') }}"></script>


<!-- Angular Base -->
<script src="{{ asset('js/script/app.js') }}"></script>
<script src="{{ asset('js/script/controllers/main/mainController.js') }}"></script>
<script src="{{ asset('js/script/extrasEnes.js') }}"></script>


<!-- Angular Only can see students or admins-->
@if(Auth::user()->type == 'student' || Auth::user()->type == 'admin')

    <!-- Angular Services (Factories) -->
    <script src="{{ asset('js/script/services/low/suspension.factories.js') }}"></script>
    <script src="{{ asset('js/script/services/schoolrecord/schoolrecord.factories.js') }}"></script>

    <!-- Angular Controllers -->
    <script src="{{ asset('js/script/controllers/low/suspensionCtrl.js') }}"></script>
    <script src="{{ asset('js/script/controllers/schoolrecord/schoolrecordCtrl.js') }}"></script>

@endif

<!-- Angular Only can see employees or admins-->
@if(Auth::user()->type == 'employee'  || Auth::user()->type == 'admin')

    <!-- Angular Services (Factories) -->
    <script src="{{ asset('js/script/services/users/users.factories.js') }}"></script>
    <script src="{{ asset('js/script/services/schoolrecord/schoolrecord.factories.js') }}"></script>
    <script src="{{ asset('js/script/services/low/suspension.factories.js') }}"></script>
    <script src="{{ asset('js/script/services/schoolrecord/schoolrecord.factories.js') }}"></script>
    <script src="{{ asset('js/script/services/schoolrecord/schoolrecordType.factories.js') }}"></script>
    <script src="{{ asset('js/script/services/applicants/applicant.factories.js') }}"></script>
<<<<<<< HEAD
    <script src="{{ asset('js/script/services/partners/partners.factories.js') }}"></script>
    <script src="{{ asset('js/script/services/teachers/teachers.factories.js') }}"></script>
    <script src="{{ asset('js/script/services/employees/employees.factories.js') }}"></script>
=======
    <script src="{{ asset('js/script/services/period/period.factories.js') }}"></script>
>>>>>>> origin/produccion

    <!-- Angular Controllers -->
    <script src="{{ asset('js/script/controllers/users/usersCtrl.js') }}"></script>
    <script src="{{ asset('js/script/controllers/low/suspencionsAdminCtrl.js') }}"></script>
    <script src="{{ asset('js/script/controllers/applicants/applicantsController.js') }}"></script>
    <script src="{{ asset('js/script/controllers/schoolrecord/schoolrecordAdminCtrl.js') }}"></script>
<<<<<<< HEAD
    <script src="{{ asset('js/script/controllers/partners/partnersCtrl.js') }}"></script>
    <script src="{{ asset('js/script/controllers/teachers/teachersCtrl.js') }}"></script>
@endif


=======
    <script src="{{ asset('js/script/controllers/schoolrecord/schoolrecordTypeAdminCtrl.js') }}"></script>
    <script src="{{ asset('js/script/controllers/period/periodAdminCtrl.js') }}"></script>
>>>>>>> origin/produccion


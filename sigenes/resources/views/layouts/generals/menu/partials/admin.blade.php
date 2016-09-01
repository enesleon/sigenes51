<div class="treemenu boxed">
  <div class="ui fluid styled accordion">
    <div class="title">
      <div class="header">
        <i class="fa fa-users"></i> {{ trans('users.title') }} <i class="dropdown icon"></i>
      </div>
    </div>

    <div class="content">
      <div class="subtitle">
        <div class="menu">
          <a class="item" href="{{ route('users.index') }}">{{ trans('users.title') }}</a>
        </div>
          <div class="menu">
          <a class="item" href="{{ route('admin.usersReport') }}">Reportes</a>
        </div>
      </div>
    </div>

    <div class="title">
      <div class="header">
        <i class="fa fa-users"></i> @lang('partners.title')
        <i class="dropdown icon"></i>
      </div>
    </div>
    <div class="content">
      <div class="subtitle">
        <div class="menu">
          <a class="item" href="{{ route('partners.index') }}"> @lang('partners.title')</a>
        </div>
      </div>
    </div>

    <div class="title">
      <div class="header">
        <i class="fa fa-user-secret"></i>@lang('employees.title')
        <i class="dropdown icon"></i>
      </div>
    </div>
    <div class="content">
      <div class="subtitle">
        <div class="menu">
          <a class="item" href="{{ route('teachers.index') }}">   @lang('teachers.title')</a>
        </div>
      </div>
    </div>
    
    <div class="title">
      <div class="header">
        <i class="treatment icon"></i> {{ trans('applicants.title') }}
        <i class="dropdown icon"></i>
      </div>
    </div>
    <div class="content">
      <div class="subtitle">
        <div class="menu">
          <a class="item" href="{{ route('applicants.index') }}">{{ trans('applicants.title') }}</a>
        </div>
      </div>
    </div>

    <div class="title">
      <div class="header">
        <i class="browser icon"></i> Validaciones
        <i class="dropdown icon"></i>
      </div>
    </div>
    <div class="content">
      <div class="subtitle">
        <div class="menu">
          <a class="item" href="{{ route('admin.low.index') }}">{{ trans('low.title') }}</a>
        </div>
        <div class="menu">
          <a class="item" href="{{ route('admin.records.index')}}"> Documentos escolares</a>
        </div>
      </div>
    </div>

    <div class="title">
      <div class="header">
        <i class="fa fa-cog"></i> Gestión
        <i class="dropdown icon"></i>
      </div>
    </div>
    <div class="content">
      <div class="subtitle">
        <div class="menu">
          <a class="item" href="{{ route('schooltype.index')}}"> {{trans('schoolrecordTypes.item')}}</a>
        </div>
        <div class="menu">
          <a class="item" href="{{ route('period.index')}}"> {{trans('period.item')}}</a>
        </div>
        <div class="menu">
          <a class="item" href="{{ route('career.index')}}"> {{trans('career.item')}}</a>
        </div>
        <div class="menu">
          <a class="item" href="{{ route('subjectMatter.index')}}"> Materias</a>
        </div>
      </div>
    </div>

    <div class="title">
      <div class="header">
        <i class="fa fa-university"></i> Estudios
        <i class="dropdown icon"></i>
      </div>
    </div>
    <div class="content">
      <div class="subtitle">
        <div class="menu">
          <a class="item" href="{{ route('schools.index') }}">Escuelas</a>
          <a class="item" href="{{ route('studiesplan.index') }}">Planes de estudios</a>
        </div>
      </div>
    </div>

    <div class="title">
      <div class="header">
        <i class="fa fa-fort-awesome"></i> Ajustes
        <i class="dropdown icon"></i>
      </div>
    </div>

    <div class="content">
      <div class="subtitle">
        <div class="menu">
          <a class="item" href="{{ route('countrys.index') }}">Escuelas</a>
        </div>
      </div>
    </div>

  </div>
</div>

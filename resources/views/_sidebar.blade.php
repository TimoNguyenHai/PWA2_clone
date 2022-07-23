<div class="c-sidebar-brand d-lg-down-none">
  Language School D&T
</div>

<ul class="c-sidebar-nav ps">

  <li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link" href="{{route('home')}}">
      <i class="c-sidebar-nav-icon cil-speedometer"></i>
      {{ __('sidebar.home') }}
    </a>
  </li>

  @can('lectors')
  <li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link {{ Request::is('lectors*') ? 'c-active' : '' }}" href="{{route('lectors.index')}}">
      <i class="c-sidebar-nav-icon cil-folder-open"></i>
      {{ __('sidebar.lectors') }}
    </a>
  </li>
  @endcan
  
  @can('courses')
  <li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link {{ Request::is('courses*') ? 'c-active' : '' }}" href="{{route('courses.index')}}">
      <i class="c-sidebar-nav-icon cil-folder-open"></i>
      {{ __('sidebar.courses') }}
    </a>
  </li>
  @endcan
  
  @can('registrations')
  <li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link {{ Request::is('registrations*') ? 'c-active' : '' }}" href="{{route('registrations.create')}}">
      <i class="c-sidebar-nav-icon cil-folder-open"></i>
      {{ __('sidebar.registration') }}
    </a>
  </li>
  @endcan

  <li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link {{ Request::is('classrooms*') ? 'c-active' : '' }}" href="{{route('classrooms.index')}}">
      <i class="c-sidebar-nav-icon cil-address-book"></i>
      {{ __('sidebar.classrooms') }}
    </a>
  </li>
  
  <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
    </div>
  </div>
  <div class="ps__rail-y" style="top: 0px; right: 0px;">
    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;">
    </div>
  </div>
  
</ul>
<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>

</div>
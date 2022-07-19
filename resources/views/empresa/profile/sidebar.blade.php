<!-- ======= Sidebar ======= -->
@php
$currentRoute = Route::current()->getName()
@endphp
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person-lines-fill"></i><span>Mi perfil</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{url('empresa/profile')}}" class="{{$currentRoute == '/empresa/profile' ? 'active' : ''}}">
            <i class="bi bi-circle"></i><span>Mis datos de empresa</span>
          </a>
        </li>         
      </ul>
      <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Postulaciones</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{url('empresa/viewCreatePostulation')}}" class="">
            <i class="bi bi-circle"></i><span>Crear oferta laboral</span>
          </a>
        </li>
        <li>
          <a href="{{url('empresa/viewPostulationList')}}" class="">
            <i class="bi bi-circle"></i><span>Historial de ofertas</span>
          </a>
        </li>        
      </ul>



  </ul>

</aside>
<!-- End Sidebar-->
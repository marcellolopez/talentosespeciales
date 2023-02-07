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
          <a href="/usuario/profile" class="{{$currentRoute == '/usuario/profile' ? 'active' : ''}}">
            <i class="bi bi-circle"></i><span>Mis datos</span>
          </a>
        </li>
        <li>
          <a href="/usuario/disabilities" class="{{$currentRoute == '/usuario/disabilities' ? 'active' : ''}}">
            <i class="bi bi-circle"></i><span>Mis capacidades</span>
          </a>
        </li>    
        <!--
        <li>
          <a href="javascript:void(0)" class="text-decoration-line-through">
            <i class="bi bi-circle"></i><span  >Mi experiencia</span>
          </a>
        </li>  
        -->           
      </ul>
      <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person-lines-fill"></i><span>Experiencia</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <li>
          <a href="/usuario/education" class="{{$currentRoute == '/usuario/education' ? 'active' : ''}}">
            <i class="bi bi-circle"></i><span>Educación</span>
          </a>
        </li>       
      </ul>
      <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <li>
          <a href="/usuario/work" class="{{$currentRoute == '/usuario/work' ? 'active' : ''}}">
            <i class="bi bi-circle"></i><span>Laboral</span>
          </a>
        </li>       
      </ul>
      <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <li>
          <a href="/usuario/other" class="{{$currentRoute == '/usuario/other' ? 'active' : ''}}">
            <i class="bi bi-circle"></i><span>Otras experiencias</span>
          </a>
        </li>       
      </ul>
      <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Postulaciones</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <!--
        <li>
          <a href="javascript:void(0)" class="text-decoration-line-through">
            <i class="bi bi-circle"></i><span >Mis postulaciones</span>
          </a>
        </li>
        -->
        <li>
          <a href="/usuario/viewPostulationList" class="">
            <i class="bi bi-circle"></i><span>Nuevos empleos</span>
          </a>
        </li>
        <li>
          <a href="/usuario/viewMyPostulationList" class="">
            <i class="bi bi-circle"></i><span>Mis postulaciones</span>
          </a>
        </li>            
      </ul>




  </ul>

</aside>
<!-- End Sidebar-->
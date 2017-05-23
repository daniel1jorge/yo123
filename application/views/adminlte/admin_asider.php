  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php base_url(); ?> assets/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ucfirst($nombre) ?> <?php echo ucfirst($apellido) ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> En Linea</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Busqueda...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Operaciones</li>
        <!-- Optionally, you can add icons to the links -->
        
        <!-- usuarios -->
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Lista Todos</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Lista Administradores</a></li>
          </ul>
        </li>
        <!-- FIN - usuarios -->
   
        <!-- Productos -->
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Productos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Listar Todos</a></li>
            <li><a href="#">Categorias</a></li>
            <li><a href="#">Categorias</a></li>
          </ul>
        </li>
        <!-- FIN - Productos -->
        <!-- Ventas -->
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Productos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Ventas</a></li>
            <li><a href="#">Ventas por usuario</a></li>
            <li><a href="#">Estadistica</a></li>
          </ul>
        </li>
        <!-- FIN - Ventas -->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->


  </aside>
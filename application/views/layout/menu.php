<body class="">

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo base_url(); ?>assets/img/profile_small.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">
                                <?php 
                                     echo $this->session->userdata('s_usuario');
                                 ?> 

                              </strong>
                             </span> <span class="text-muted text-xs block">Programador <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url(); ?>clogin/salir">Salir</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>cclientes"><i class="fa fa-user"></i> <span class="nav-label">Clientes</span> <span ></span></a>
                </li> 
                <li>
                    <a href="<?php echo base_url(); ?>cpacientes"><i class="fa fa-user-md"></i> <span class="nav-label">Pacientes</span> <span></span></a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>cficha"><i class="fa fa-user"></i> <span class="nav-label">Historial</span> <span ></span></a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>cusuarios"><i class="fa fa-user"></i> <span class="nav-label">Usuarios</span> <span ></span></a>
                </li>
                  
                <li>
                    <a href=""><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Citas</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo base_url();?>ceventos">Eventos</a></li>
                        <li><a href="<?php echo base_url();?>chorarios">Horario</a></li>
                        <li><a href="<?php echo base_url();?>chorarios">Listados</a></li>
                    </ul>
                </li>
          
                <li class="">
                    <a  href="#"><i ></i> <span class="nav-label"></span></a>
                </li>
                <li class="special_link">
                    <a href="#"><i ></i> <span class="nav-label"></span></a>
                </li>
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
 
                <li>
                    <a href="<?php echo base_url(); ?>clogin/salir">
                        <i class="fa fa-sign-out"></i> Salir
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="wrapper wrapper-content">
            <div class="row">
   
                
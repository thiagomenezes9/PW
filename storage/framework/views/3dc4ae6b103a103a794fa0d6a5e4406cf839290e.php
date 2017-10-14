<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <?php if(! Auth::guest()): ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo e(Gravatar::get($user->email)); ?>" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p><?php echo e(Auth::user()->name); ?></p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> <?php echo e(trans('adminlte_lang::message.online')); ?></a>
                </div>
            </div>
        <?php endif; ?>

        
        
            
                
              
                
              
            
        
        

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>

            <li class="<?php echo e(isset($activeContato) ? $activeContato : 'treeview'); ?>">

                <a href="<?php echo e(route('pais.index')); ?>">
                    <i class="fa fa-globe"></i>
                    <span>Paises</span>
                    
                </a>

                

                <a href="<?php echo e(route('estados.index')); ?>">
                    <i class="fa fa-flag"></i>
                    <span>Estados</span>
                    
                </a>

                

                <a href="<?php echo e(route('cidades.index')); ?>">
                    <i class="fa fa-map"></i>
                    <span>Cidades</span>
                    
                </a>



                <a href="<?php echo e(route('clientes.index')); ?>">
                    <i class="fa fa-user"></i>
                    <span>Clientes</span>
                    
                </a>



                
                    
                    
                    
                



               
            </li>
            <!-- Optionally, you can add icons to the links -->
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

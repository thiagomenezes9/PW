<?php $__env->startSection('htmlheader_title'); ?>
    Paises
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
    Lista dos Paises
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>

    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Paises</h3>
                        <div align="right"><a href="<?php echo e(route('pais.create')); ?>" class="btn btn-success">Novo</a></div>
                    </div>

                    <div class="box-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <td class="col-md-6"><strong>Nome</strong></td>
                                <td align="center"><strong>Ações</strong></td>
                            </tr>
                            </thead>


                            <tbody>
                            <?php $__currentLoopData = $paises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr align="center">
                                    <td align="left"><?php echo e($p->nome); ?></td>
                                    <td>
                                        <a class="btn btn-small btn-info" href="<?php echo e(route('pais.show',$p->id)); ?>" >
                                            <i class="fa fa-search-plus"></i>
                                            Detalhes
                                        </a>

                                        <a class="btn btn-small btn-warning" href="<?php echo e(route('pais.edit',$p->id)); ?>" >
                                            <i class="fa fa-pencil-square-o"></i>
                                            Editar
                                        </a>

                                        <a class="btn btn-small btn-danger" data-toggle="modal" href="#myModal<?php echo e($p->id); ?>" >
                                            <i class="fa fa-trash-o"></i>
                                            Excluir
                                        </a>

                                        <div class="modal fade modal-danger" id="myModal<?php echo e($p->id); ?>" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Excluir</h4>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <p>Realmente Deseja excluir <?php echo e($p->nome); ?> ??</p>
                                                    </div>

                                                    <div class="modal-footer">

                                                        <form id="formDelete<?php echo e($p->id); ?>"
                                                              action="<?php echo e(action('PaisController@destroy',$p->id)); ?>" method="POST">

                                                            <?php echo e(csrf_field()); ?>

                                                            

                                                            <input type="hidden" name="_method" value="DELETE">

                                                            <button class="btn btn-danger" type="submit">Excluir</button>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>


                                                        </form>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>



                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <div class="text-center">
                            <?php echo $paises->links(); ?>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('htmlheader_title'); ?>
    Estados
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
    Descrição
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>


    <?php if($errors->any()): ?>
        <div class="box alert alert-danger">
            <div class="box-header with-border">
                <h3 class="box-title text-gray">Opss! Alguma coisa errada</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool"
                            data-widget="remove" data-toggle="tooltip" title="Fechar">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

        </div>
    <?php endif; ?>



    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edição do Estado de <?php echo e($estado->nome); ?></h3>
                        <div align="right"><a href="<?php echo e(route('estados.index')); ?>" class="btn btn-info">Voltar</a></div>
                        
                    </div>

                    <div class="box-body">

                        <form class="form-horizontal" action="<?php echo e(route('estados.update',$estado->id)); ?>" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="_method" value="PUT">

                            <?php echo e(csrf_field()); ?>




                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label" >Nome</label>
                                <div class="col-sm-10">
                                    <input name="nome" value="<?php echo e($estado->nome); ?>" type="text" class="form-control input-lg"
                                           id="nome" placeholder="Nome do Estado" autofocus>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="sigla" class="col-sm-2 control-label" >Sigla</label>
                                <div class="col-sm-10">
                                    <input name="sigla" value="<?php echo e($estado->sigla); ?>" type="text" class="form-control input-lg"
                                           id="sigla" placeholder="Sigla do Estado" autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pais" class="col-sm-2 control-label">Pais</label>
                                <div class="col-sm-10">
                                    <select name="pais" id="pais" class="form-control">
                                        <?php $__currentLoopData = $pais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($p->id); ?>" <?php echo e($p->id === (isset($estado->pais_id) ? $estado->pais_id : '' ) ? 'selected' : ''); ?>><?php echo e($p->nome); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div>
                            </div>



                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right btn-lg">
                                    Save</button>

                            </div>



                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
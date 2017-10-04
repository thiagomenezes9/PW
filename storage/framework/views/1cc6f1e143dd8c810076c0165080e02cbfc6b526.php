<?php $__env->startSection('htmlheader_title'); ?>
    Cidades
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
    Nova Cidade
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
                        <h3 class="box-title">Nova Cidade</h3>
                        <div align="right"><a href="<?php echo e(route('cidades.index')); ?>" class="btn btn-info">Voltar</a></div>
                    </div>

                    <div class="box-body">

                        <form class="form-horizontal" action="<?php echo e(action('CidadeController@store')); ?>" method="post" enctype="multipart/form-data">

                            <!-- 'nome', 'sigla',
                                'bandeira' -->

                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>



                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label" >Nome</label>
                                <div class="col-sm-10">
                                    <input name="nome" value="<?php echo e(old('nome')); ?>" type="text" class="form-control input-lg"
                                           id="nome" placeholder="Nome da Cidade" autofocus>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="sigla" class="col-sm-2 control-label" >Sigla</label>
                                <div class="col-sm-10">
                                    <input name="sigla" value="<?php echo e(old('sigla')); ?>" type="text" class="form-control input-lg"
                                           id="sigla" placeholder="Sigla da Cidade" autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pais" class="col-sm-2 control-label">Estado</label>
                                <div class="col-sm-10">
                                    <select name="estado" id="estado" class="form-control">
                                      <?php $__currentLoopData = $estado; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($e->id); ?>"><?php echo e($e->nome); ?></option>
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
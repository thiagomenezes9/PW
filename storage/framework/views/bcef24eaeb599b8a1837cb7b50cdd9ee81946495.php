<?php $__env->startSection('htmlheader_title'); ?>
    Clientes
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
    Novo Cliente
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
                        <h3 class="box-title">Novo Cliente</h3>
                        <div align="right"><a href="<?php echo e(route('clientes.index')); ?>" class="btn btn-info">Voltar</a></div>
                    </div>

                    <div class="box-body">

                        <form class="form-horizontal" action="<?php echo e(action('ClienteController@store')); ?>" method="post" enctype="multipart/form-data">

                            <!-- ['nome','dtnasc','email','sexo','cpf','rg'] -->

                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>



                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label" >Nome</label>
                                <div class="col-sm-10">
                                    <input name="nome" value="<?php echo e(old('nome')); ?>" type="text" class="form-control input-lg"
                                           id="nome" placeholder="Nome do cliente" autofocus>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="dataNasc" class="col-sm-2 control-label" >Data Nascimento</label>
                                <div class="col-sm-10">



                                    <input placeholder="00/00/0000" name="dtnasc" value="<?php echo e(old('dtnasc')); ?>" type="text" class="form-control input-lg"
                                           id="dtnasc">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label" >Email</label>
                                <div class="col-sm-10">
                                    <input name="email" value="<?php echo e(old('email')); ?>" type="email" class="form-control input-lg"
                                           id="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sexo" class="col-sm-2 control-label">Sexo</label>
                                <div class="col-sm-10">
                                    <select name="sexo" id="sexo" class="form-control">

                                            <option value="Masculino">Masculino</option>
                                            <option value="Feminino">Feminino</option>

                                    </select>



                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label" >CPF</label>
                                <div class="col-sm-10">
                                    <input name="cpf" value="<?php echo e(old('cpf')); ?>" type="text" class="form-control input-lg"
                                           id="cpf" placeholder="CPF" autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="rg" class="col-sm-2 control-label" >RG</label>
                                <div class="col-sm-10">
                                    <input name="rg" value="<?php echo e(old('rg')); ?>" type="text" class="form-control input-lg"
                                           id="rg" placeholder="rg" autofocus>
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
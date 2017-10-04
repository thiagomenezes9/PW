<?php $__env->startSection('htmlheader_title'); ?>
    Paises
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
    Descrição
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>

    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Paises</h3>

                        <div align="right"><a href="<?php echo e(route('pais.index')); ?>" class="btn btn-info">Voltar</a></div>
                        
                    </div>

                    <div class="box-body">


                        <p><strong><h2>Pais : <?php echo e($pais->nome); ?></h2></strong></p><br>
                        <p><strong>Sigla : <?php echo e($pais->sigla); ?></strong></p><br>
                        <h5>Bandeira : </h5> <br>

                        <img src="<?php echo e($pais->bandeira); ?>">


                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
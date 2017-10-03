<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Result(s)</div>
                    <div class="panel-body">
                        <div class="row selection">
                            <div class="col m10 offset-m2">
                                <?php $__currentLoopData = array_chunk($products,3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productChunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row">
                                        <?php $__currentLoopData = $productChunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col m3">

                                                <div class="card" style="height: 350px!important;" id="<?php echo e($product->id); ?>"
                                                     onclick="gestionClick(<?php echo e($product->id); ?>);">
                                                    <div class="card-image">
                                                        <img src="<?php echo e($product->logo); ?>" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-content">
                                                        <p>
                                                            <span class="card-title" id="name<?php echo e($product->id); ?>"><?php echo e($product->name); ?></span></p>
                                                        <p>
                                                            <span><b><?php echo e($product->price); ?>$</b></span>
                                                            <?php echo e($product->description); ?>

                                                        </p>
                                                    </div>
                                                </div>
                                                <div id="icon<?php echo e($product->id); ?>"></div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>


                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>


                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
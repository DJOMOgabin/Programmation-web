<?php $__env->startSection('body'); ?>
    <?php if($services->first()==null): ?>
                        <div class="col-md-10">
                            <h4 class="content-header" style="text-align: center">Vous n'avez aucun service</h4>
                        </div>
                    <?php else: ?>
                        <?php $__currentLoopData = $services->chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productChunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row">
                                        <?php $__currentLoopData = $productChunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-3 panel-heading offset-m1 panel panel-default">
                                                <div class="thumbnail">
                                                    <img src="<?php echo e(asset('images/'.$service->logo)); ?>" alt="Book">
                                                    <div class="caption">
                                                        <h3><?php echo e($service->name); ?></h3>
                                                        <p class="description">
                                                            <?php echo e($service->description); ?>

                                                        </p>
                                                        <div class="clearfix">
                                                            <div class="pull-left price"><?php echo e($service->price); ?> <?php echo e($service->currency); ?></div>
                                                        </div>
                                                        <br>
                                                        <?php if($service->publication==1): ?>
                                                            <div style="background-color: forestgreen; text-align: center">
                                                                <i><b style="color: red">
                                                                        <a href="<?php echo e('detail'); ?>?id=<?php echo e($service->id); ?>" class="small-box-footer">
                                                                            More information <i class="fa fa-arrow-circle-right"></i></a>
                                                                        <br></b></i>
                                                        <?php else: ?>
                                                            <div style="background-color:firebrick; text-align: center">
                                                                <i><b style="color: green">
                                                                        <a href="<?php echo e('detail'); ?>?id=<?php echo e($service->id); ?>" class="small-box-footer">
                                                                            More information <i class="fa fa-arrow-circle-right"></i></a>
                                                                        <br></b></i>
                                                        <?php endif; ?>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>

                <br><br><br>
                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-5"></div>
                    <div class="col-md-2">
                        <form action="<?php echo e(route('create')); ?>" method="get">
                            <button class="btn btn-block" type="submit">
                                <span>Create <i class="fa fa-plus-square"></i></span>
                            </button>
                        </form>
                    </div>
                </div><br><br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
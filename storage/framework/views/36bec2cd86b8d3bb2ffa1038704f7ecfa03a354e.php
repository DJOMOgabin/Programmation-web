<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col m8 col offset-m2">
            <br>
            <br>
            <br><br>
            <br>
            <div class="panel panel-default ">
                <div class="panel-heading center-align"><h3 >Login</h3></div>
                <div class="panel-body">
                    <form class="col m10 offset-m1" role="form" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="row<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">

                            <div class=" input-field ">
                                <input id="email" type="email" class="" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                                <label for="email">E-Mail Address</label>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">

                            <div class="input-field ">
                                <input id="password" type="password" class="" name="password" required>
                                <label for="password" >Password</label>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="divider"></div>
                        <br/>

                        <div class="row">
                            <div class="col m8">
                                <div class="row"> <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a href="<?php echo e(route('password.request')); ?>">
                                        Forgot Your Password?
                                    </a></div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br><br>
<br><br>
<br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.myApp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
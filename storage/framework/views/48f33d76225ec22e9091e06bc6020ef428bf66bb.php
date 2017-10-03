<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <br>
                    <br>
                    <br>
                    <div class="panel-heading"><h3 class="center-align">Choose default settings</h3></div>
                    <div class="panel-body">


                        <form action="/defaultSettings" role="form" enctype="multipart/form-data" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
                            <div>
                                <span><h4>Colors</h4></span>
                                <hr/>
                                <div class="row">
                                    <div class="input-field  col m5 ">
                                        <select id="color1" name="color1" required>
                                            <option value="" disabled selected>Which color?</option>
                                            <option value="red">red</option>
                                            <option value="blue">blue</option>
                                            <option value="yellow">yellow</option>
                                            <option value="black">black</option>
                                            <option value="white">white</option>
                                            <option value="gray">gray</option>
                                        </select>
                                        <label>First Color</label>
                                    </div>
                                    <div class="input-field col m5 offset-m2 ">
                                        <select id="color2" name="color2" required>
                                            <option value="" disabled selected>Which color?</option>
                                            <option value="red">red</option>
                                            <option value="blue">blue</option>
                                            <option value="yellow">yellow</option>
                                            <option value="black">black</option>
                                            <option value="white">white</option>
                                            <option value="gray">gray</option>
                                        </select>
                                        <label>Second Color</label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <span><h4>Logo</h4></span>
                                <hr/>


                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>File</span>
                                        <input type="file" accept=".gif,.jpg,.jpeg,.png" id="image" name="image" required>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>


                            <div class="col m6  offset-m4">
                                <button type="submit" class="btn btn-primary">
                                    Finish
                                </button>
                            </div>

                        </form>
                    </div>


                </div>

            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.myApp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
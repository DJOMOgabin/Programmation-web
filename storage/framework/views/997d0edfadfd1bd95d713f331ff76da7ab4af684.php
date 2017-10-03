<?php $__env->startSection('formulaire'); ?>
    <div class="panel-body">
        <form class="col m10 offset-m1" role="form" method="POST" action="<?php echo e('save'); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


            <div class="row">
                <div class="input-field col m11">
                    <input id="name" type="text" name="name"  required="Service's Name" autofocus>
                    <label for="name">Service's Name <i style="color: red">*</i> </label>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="input-field col m8">
                    <select name="category" id="category">
                        <option value="" disabled selected>Which category?</option>
                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($categor->name); ?>"><?php echo e($categor->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <label for="category">Category <i style="color: red">*</i> </label>
                </div>
                <a class="btn btn-primary" onclick="ajoutCat()" id="ajoutCat">+ Others</a>
                <a class="btn btn-primary" onclick="enleveCat()" id="removeCat">Remove</a>
            </div>
            <br>
            <div class="row" id="othersCat">

            </div>
            <div class="row" id="selection">
                <div class="input-field col m8">
                    <select name="sector" id="sector">
                        <option value="" disabled selected>Which Sector Of This Other Category?</option>
                        <?php $__currentLoopData = $sectors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($sector->name); ?>"><?php echo e($sector->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <label for="category">Category <i style="color: red">*</i> </label>
                </div>
                <a class="btn btn-primary" onclick="ajoutSect()" id="ajoutSect">+ Others</a>
                <a class="btn btn-primary" onclick="enleveSect()" id="removeSect">Remove</a>
            </div>
            <br>
            <div class="row" id="othersSect">

            </div>

            <div class="row">
                <div class="input-field col m11">
                    <label for="description">Description</label>
                    <textarea rows="5" cols="120" class="form-control" name="description" placeholder="Describ your service..."></textarea>
                </div>

            </div>
            <br><br>

            <div class="row">
                <label for="image"  class="input-field col m11">Le logo du service</label>
                <div  class="input-field col m11">
                    <input required onchange="Valeur(this)"
                           accept="image/*" value="" type="file" id="logo" name="logo" class="form-control">
                    <br>
                    <div class="col-md-11">
                        <img style="max-width: 80%" src="......" alt="logo's image" id="image" width="250" height="200">
                    </div>

                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="input-field col m11">
                    <select name="monaie" id="monaie">
                        <?php $__currentLoopData = $monaies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monaie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($monaie->name); ?>"><?php echo e($monaie->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <label for="monaie">Which Currency?</label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="input-field col m11">
                    <input type="checkbox" value="1" id="publication" name="publication">
                    <label for="publication">Publish it?</label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <a href="<?php echo e('home'); ?>" class="btn btn-block"><span>Return <i class="fa fa-mail-reply"></i></span></a>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-4">
                    <button class="btn btn-block" type="submit">
                        <span>Create <i class="fa fa-plus-square"></i></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script>
        otherC=0;
        otherS=0;
        $("#removeCat").hide();
        $("#removeSect").hide();
        $("#selection").hide();
        function Valeur(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function () {
            $("#ajoutCat").show();
            $("#ajoutSect").show();
        });
        function enleveCat() {
            $('#addCat').remove();
            $('#removeCat').hide();
            $('#ajoutCat').show();
            $("#selection").hide();
            otherC=0;
        }
        function ajoutCat() {
            var tr = document.createElement('div');
            tr.innerHTML = "<div class='input-field col m11' id='addCat'>" +
                    "<input type='text' name='otherCat' value=' ' required autofocus>" +
                    "<label for='orther'>Other Category<i style='color: #ff1518'>*</i></label>" +
                    "<br><br></div></div>";
            if (otherC == 0) {
                otherC = 1;
                $('#othersCat').append(tr);
                $('#ajoutCat').hide();
                $('#removeCat').show();
            }
            $("#selection").show();
        }
        function enleveSect() {
            $('#addSect').remove();
            $('#removeSect').hide();
            $('#ajoutSect').show();
            otherS=0;
        }
        function ajoutSect() {
            var tr = document.createElement('div');
            tr.innerHTML = "<div class='input-field col m11' id='addSect'>" +
                    "<input type='text' name='otherSect' value=' ' required autofocus>" +
                    "<label for='orther'>Other Sector<i style='color: #ff1518'>*</i></label>" +
                    "<br><br></div></div>";
            if (otherS == 0) {
                otherS = 1;
                $('#othersSect').append(tr);
                $('#ajoutSect').hide();
                $('#removeSect').show();
            }
        }

        function Changer() {
            var preview = document.querySelector('img');
            var file    = document.querySelector('input[type=file]').files[0];
            var reader  = new FileReader();
            reader.onloadend = function () {
                preview.src = reader.result;
            }
            prompt("toto","toto");
            if (file) {
                reader.readAsDataURL(file);
                prompt(file,file);
            } else {
                prompt("titi","titi");
                preview.src = "";
            }
        }
    </script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <div class="container">
        <div class="row">
            <div class="col m10 offset-m1">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Service</div>
                    <div class="panel-body">
                        <?php echo $__env->yieldContent('formulaire'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("admin", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
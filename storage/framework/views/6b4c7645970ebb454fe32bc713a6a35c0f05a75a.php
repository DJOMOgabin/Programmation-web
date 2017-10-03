<?php $__env->startSection('title'); ?>
    Default Services
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="center-align">Default(s) Service(s)</h3></div>
            <div class="panel-body">
                <div class="row selection">
                    <div class="col m10 offset-m2">
                        <?php $__currentLoopData = $products->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productChunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row">
                                <?php $__currentLoopData = $productChunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col m4 ">

                                        <div class="card same" id="<?php echo e($product->id); ?>"
                                             onclick="gestionClick(<?php echo e($product->id); ?>);">
                                            <div class="card-image">
                                                <img src="<?php echo e($product->imagePath); ?>" height="150px" width="150px">
                                            </div>
                                            <div class="card-content">
                                                <p>
                                                    <span class="card-title"
                                                          id="name<?php echo e($product->id); ?>"><?php echo e($product->title); ?></span>
                                                    <br></p>
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
                <div class="row selection">
                    <div class="col m6  offset-m5">
                        <button id="next" onclick="suivant();" class="btn btn-primary">
                            NEXT
                        </button>
                    </div>
                </div>
                <form class="col m10 offset-m1" role="form" method="POST" action="/defaultServices/add">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">


                    <div class="row">
                        <div class="col m6  offset-m4">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            $('form').hide();
            $('.same').matchHeight({
                byRow: true,
                property: 'height',
                target: null,
                remove: false
            });
            localStorage.removeItem("ids");
        });
        function suivant() {
            if (typeof(localStorage.ids) != "undefined") {
                var ids = JSON.parse(localStorage.getItem("ids"));
                if (ids.length == 0) {
                    goToSettings();
                } else {
                    for (i = 0; i < ids.length; i++) {
                        console.log(ids.length);
                        var name = $('#name' + ids[i]).text();
                        var value = 'value' + ids[i];
                        $('#_token').after(" <div class='row'> <div class='input-field '> <input id='" + value + "' type='number' name='" + value + "' required> <label for='" + value + "'>Price of " + name + "</label> </div> </div>")
                    }
                    $('.selection').hide();
                    $('form').show();
                }
            } else {
                goToSettings();
            }
        }

        function goToSettings() {
            window.location.href = "localhost:8000/defaultSettings";
        }
        function gestionClick(id) {
            id = id + "";
            var ids = [];
            if (typeof(localStorage.ids) == "undefined") {
                ids.push(id);
                console.log("ids[0] : " + ids[0])
                localStorage.setItem("ids", JSON.stringify(ids));
                changeStyleSelection(id);
                console.log("Selection : " + id);
            } else {
                ids = JSON.parse(localStorage.getItem("ids"));
                if ($.inArray(id, ids) == -1) {
                    console.log("Il n'existe pas:" + ids)
                    ids.push(id);
                    changeStyleSelection(id);
                    console.log("Selection : " + id);
                    console.log(ids)
                    localStorage.setItem("ids", JSON.stringify(ids));
                } else {
                    console.log("Il existe:" + ids)
                    ids.splice($.inArray(id, ids), 1);
                    changeStyleDeselection(id);
                    console.log("Deselection : " + id);
                    console.log(ids)
                    localStorage.setItem("ids", JSON.stringify(ids));
                }
            }

        }

        function changeStyleSelection(id) {

            $("#" + id).addClass("selectedService")
            $("#icon" + id).addClass("fa fa-check-circle-o fa-3x")
        }
        function changeStyleDeselection(id) {

            $("#" + id).removeClass("selectedService")
            $("#icon" + id).removeClass("fa fa-check-circle-o fa-3x")
        }
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.myApp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
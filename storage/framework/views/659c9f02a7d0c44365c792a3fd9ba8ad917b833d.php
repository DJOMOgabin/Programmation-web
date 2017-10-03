<?php $__env->startSection("content"); ?>
    <div id="google_translate_element"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,fr,la,zh-CN',
                layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL,
                multilanguagePage: true
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript"
            src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <div class="hold-transition">
        <?php echo $__env->yieldContent('body'); ?>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/materialize.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/script.js')); ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script type="text/javascript" src="<?php echo e(asset('js/scriptRegister.js')); ?>"></script>
    <!--  Scripts-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.myApp", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
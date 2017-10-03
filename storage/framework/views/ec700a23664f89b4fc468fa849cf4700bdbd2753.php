<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title class="nom_boutique"></title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/icons.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/test.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link href="min/plugin-min.css" type="text/css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    
    <link href="css/materialize.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">


</head>

<body>

<div id="nav">
    <div class="navbar-fixed  nav-extended">
        <nav class="blue">
            <!-- NAV LOGO ET RECHERCHE -->
            <nav class="nav-border blue">
                <div class="nav-wrapper">
                    <div class="container">

                        <div class="row logo-wrapper">
                            <!-- LOGO -->
                            <div class="col s2">
                                <a href="#" class="brand-logo">Annonceur</a>
                                <a href="#" data-activates="mobile-menu" class="button-collapse"><i
                                            class="material-icons">menu</i></a>
                            </div>

                            <!-- RECHERCHE -->
                            <div class="col s7 recherche_wrapper hide-on-med-and-down">
                                <form>
                                    <div class="input-field">
                                        <input id="search" type="search" placeholder="Search" required>
                                        <label class="label-icon" for="search"><i class="material-icons">search</i>
                                        </label>
                                    </div>



                                </form>
                            </div>

                            <!-- Modal Structure -->
                            <div id="modal1" class="modal modal-fixed-footer">
                                <div class="modal-content">

                                </div>
                            </div>

                            <!-- MENUS ET AVATAR-->
                            <div class="col right hide-on-med-and-down" id="menus">
                                <ul class="right">
                                    <li><a href="home"><i class="material-icons tooltipped" data-position="bottom"
                                                          data-delay="50" data-tooltip="Home">home</i></a>
                                    </li>
                                    <li><a href="#"><i class="material-icons tooltipped" data-position="bottom"
                                                       data-delay="50" data-tooltip="Services">laptop</i></a>
                                    </li>
                                    <?php if(!Auth::guest()): ?>
                                        <?php if(Auth::user()->typeOfUser=="Company"): ?>
                                            <li><a href="/store"><i class="material-icons tooltipped" data-position="bottom"
                                                                    data-delay="50" data-tooltip="Partners">store</i></a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if(Auth::user()->typeOfUser=="Admin"): ?>
                                            <li><a href="/admin/home"><i class="material-icons tooltipped" data-position="bottom"
                                                                         data-delay="50" data-tooltip="Partners">Admin</i></a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <li><a href="#"><i class="material-icons tooltipped" data-position="bottom"
                                                       data-delay="50" data-tooltip="Support">forum</i></a>
                                    </li>
                                    <li><a href="#"><i class="material-icons tooltipped" data-position="bottom"
                                                       data-delay="50" data-tooltip="Help">help</i></a>
                                    </li>
                                </ul>
                            </div>

                            <!-- SIGN UP et SIGN IN -->
                            <!-- SIGN UP et SIGN IN -->
                            <span id="welcome"> <?php if(Auth::guest()): ?>
                                    <span id="welcome"><a href="/register">Sign Up</a>/
                                    <a href="/login">Sign In</a> </span>

                                <?php else: ?>
                                    <a href="#" class="dropdown-button" data-toggle="dropdown" data-activates='dropdown1'>
                                        <?php echo e(Auth::user()->name); ?>

                                    </a>

                                    <ul class="dropdown-content" id='dropdown1'>
                                        <li>
                                            <a href="<?php echo e(route('logout')); ?>"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                <?php echo e(csrf_field()); ?>

                                            </form>
                                        </li>
                                    </ul>
                                <?php endif; ?> </span>
                            <!-- AVATAR -->
                            <div class="wrapper right tooltipped" data-position="bottom" data-delay="50"
                                 data-tooltip="My Account" id="avatar">
                                
                            </div>
                            <!-- FIN MENUS ET AVATAR -->
                        </div>

                        <ul class="side-nav" id="mobile-menu">
                            <li><a href="#"><i class="material-icons">power_settings_new</i></a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
            <!-- FIN NAV LOGO ET RECHERCHE -->
        </nav>
    </div>
</div>

<!-- SIDENAV -->
<div class="navbar top" id="bar_de_nav">
    <ul id="slide-out" class="side-nav">
        <li class="blue">
            <div class="userView">
                <div class="background">
                </div>
                <a href="#!user"><img class="circle" src="images/logo.jpg"></a>
                <a href="#!name"><span class="white-text name">John Doe</span></a>
                <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
            </div>
        </li>
        <li><a href="#!">First Link With Icon</a></li>
        <li><a href="#!">Second Link</a></li>
        <li>
            <div class="divider"></div>
        </li>
        <li><a class="subheader">Subheader</a></li>
        <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
    </ul>
    <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
</div>
<!-- END SIDENAV -->

<!--Main layout-->
<div class="container">
    <div class="row">

        <!--Sidebar-->
        <div class="col s4 wow fadeIn left" data-wow-delay="0.2s">
            <div class="gps">

            </div>
        </div>
        <!--/.Sidebar-->

        <!--Main column-->
        <div class="col s7 right" id="slider_Produits">

            <!--First row-->
            <div class="row wow fadeIn" data-wow-delay="0.4s">
                <div class="col s12">
                    <div class="divider-new">
                        <h2 class="h2-responsive ">What's new?</h2>
                    </div>

                    <!-- SLIDER -->
                    <div class="slider">
                        <ul class="slides">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <img src="<?php echo e($product->logo); ?>"> <!-- random image -->
                                    <div class="caption center-align">
                                        <h3><?php echo e($product->name); ?></h3>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    </br>
                    <div class="divider"></div>
                    <!-- FIN SLIDER -->
                </div>
            </div>
        </div>
        <!--/.Main column-->
    </div>
</div>
<!--/.Main layout-->
<div class="section scrollspy" id="work">
    <div class="container">
        <h2 class="header text_b"> My Services</h2>
        <div class="row">

        </div>
        <div class="row ">
            <div class="col m10 offset-m2">
                <?php $__currentLoopData = $products->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productChunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                        <?php $__currentLoopData = $productChunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col s12 m4 l4">
                                <div class="card same">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img class="activator" src="<?php echo e($product->logo); ?>">
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title activator grey-text text-darken-4"><?php echo e($product->name); ?> <i
                                                    class="material-icons right">more_vert</i></span>
                                    </div>
                                    <div class="card-reveal">
                                        <span class="card-title grey-text text-darken-4"><?php echo e($product->name); ?>

                                            <b><?php echo e($product->price); ?><?php echo e(Auth::user()->price); ?></b> <i
                                                    class="material-icons right">close</i></span>
                                        <p><?php echo e($product->description); ?></p>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>


                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>


        </div>

    </div>
</div>

<!-- SCRIPTS -->

<!-- JQuery -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/projet.js"></script>
<script src="js/materialize.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
<script src="js/init.js"></script>
<script src="js/modernizr.js"></script>
<script src="min/custom-min.js"></script>
<script type="text/javascript" src="<?php echo e(asset('js/jquery.matchHeight.js')); ?>"></script>

<script>
    $(document).ready(function () {
        $('.same').matchHeight({
            byRow: true,
            property: 'height',
            target: null,
            remove: false
        });
    })
    new WOW().init();
</script>

</body>

</html>
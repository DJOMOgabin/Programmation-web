<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Annonceur</title>

    <link href="<?php echo e(asset('css/icon.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/materialize.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/color-picker.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style1.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(captcha_layout_stylesheet_url()); ?>" type="text/css" rel="stylesheet">
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/icons.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/test.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link href="min/plugin-min.css" type="text/css" rel="stylesheet">
    
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
<!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
    </script>
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
                                    <a class="teal darken-1 btn-flat btn modal-trigger" href="#modal1" id="recherche_A">Advanced</a>
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
    <div class="container millieu" id="main">
        <!-- FOOTER -->
    <?php echo $__env->yieldContent("content"); ?><!-- END FOOTER -->

    </div>

<footer class="page-footer blue">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Group Annonceur</h5>
                <p class="grey-text text-lighten-4">We are a team of college students working on this project like
                    it's our full time job. Any amount would help support and continue development on this project
                    and is greatly appreciated.</p>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Settings</h5>
                <ul>
                    <li><a class="white-text" href="#!">Link 1</a></li>
                    <li><a class="white-text" href="#!">Link 2</a></li>
                    <li><a class="white-text" href="#!">Link 3</a></li>
                    <li><a class="white-text" href="#!">Link 4</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Connect</h5>
                <ul>
                    <li><a class="white-text" href="#!">Link 1</a></li>
                    <li><a class="white-text" href="#!">Link 2</a></li>
                    <li><a class="white-text" href="#!">Link 3</a></li>
                    <li><a class="white-text" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Groupe Annonceur</a>
        </div>
    </div>
</footer>

<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/projet.js"></script>
<script src="js/materialize.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
<script src="js/init.js"></script>
<script src="js/modernizr.js"></script>
<script src="min/custom-min.js"></script>
<script src="<?php echo e(asset('js/app.js')); ?>"></script>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/jquery.matchHeight.js')); ?>"></script>

<script type="text/javascript" src="<?php echo e(asset('js/materialize.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/scriptRegister.js')); ?>"></script>
<script async defer src="<?php echo e(asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyDs0ewrWvur-DjQ8jiTlLBq5DcSqiB56WE&callback=gestionLocalisaton')); ?>"
        type="text/javascript"></script>



<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/projet.js"></script>
<script src="js/materialize.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
<script src="js/init.js"></script>
<script src="js/modernizr.js"></script>
<script src="min/custom-min.js"></script>
<script>
    new WOW().init();
</script>

</body>
</html>
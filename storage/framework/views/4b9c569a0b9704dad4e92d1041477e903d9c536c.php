<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Annonceur</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/icons.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/test.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link href="min/plugin-min.css" type="text/css" rel="stylesheet">

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

                                    <div class="row">
                                        <div class="input-field">
                                            <input id="location" type="text" name="location">
                                            <label for="location">Where?</label>
                                            <a class="btn btn-primary" id="myLocation"> My location</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col m4"><input name="distance" type="radio" id="distance"
                                                                   class="with-gap" value="1"/>
                                            <label for="test1">0-1Km</label></div>
                                        <div class="col m4"><input name="distance" type="radio" id="distance"
                                                                   class="with-gap" value="2"/>
                                            <label for="test2">1-3Km</label></div>
                                        <div class="col m4"><input class="with-gap" name="distance" type="radio"
                                                                   id="distance"  value="3"/>
                                            <label for="test3">3-5Km</label></div>

                                    </div>
                                    <div class="row">
                                        <div class="input-field">
                                            <input id="supplier" name="supplier" type="text">
                                            <label for="supplier">Which supplier?</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col m6">
                                            <input id="min" name="min" min="0" type="number">
                                            <label for="min">Minimal cost</label>
                                        </div>
                                        <div class="input-field col m6">
                                            <input id="max" name="max" min="0" type="number">
                                            <label for="max">Maximal cost</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit"
                                            class="modal-action modal-close waves-effect waves-green btn-flat ">Find
                                    </button>
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
                                        <?php endif; ?> <?php if(Auth::user()->typeOfUser=="Admin"): ?>
                                            <li><a href="/admin/home"><i class="material-icons tooltipped" data-position="bottom"
                                                               data-delay="50" data-tooltip="Partners">store</i></a>
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
                            <span id="welcome"> <?php if(Auth::guest()): ?>
                                    <span id="welcome"><a href="/register">Sign Up</a>/
                                    <a href="/login">Sign In</a> </span>

                                <?php else: ?>
                                    <a href="#" class="dropdown-button" data-toggle="dropdown"
                                       data-activates='dropdown1'>
                                        <?php echo e(Auth::user()->name); ?>

                                    </a>

                                    <ul class="dropdown-content" id='dropdown1'>
                                        <li>
                                            <a href="<?php echo e(route('logout')); ?>"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                                  style="display: none;">
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
<?php echo $__env->yieldContent("slider"); ?>
<div class="contaier millieu" id="main">
    <!-- FOOTER -->
<?php echo $__env->yieldContent("content"); ?><!-- END FOOTER -->
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
</div>


<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/projet.js"></script>
<script src="js/materialize.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
<script src="js/init.js"></script>
<script src="js/modernizr.js"></script>
<script src="min/custom-min.js"></script>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/jquery.matchHeight.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/materialize.min.js')); ?>"></script>
<script>
    $(document).ready(function () {
        $('.dropdown-button').dropdown({
                    inDuration: 300,
                    outDuration: 225,
                    constrainWidth: false, // Does not change width of dropdown to that of the activator
                    hover: true, // Activate on hover
                    gutter: 0, // Spacing from edge
                    belowOrigin: false, // Displays dropdown below the button
                    alignment: 'left', // Displays dropdown with edge aligned to the left of button
                    stopPropagation: false // Stops event propagation
                }
        );

    })
</script>
</body>
</html>
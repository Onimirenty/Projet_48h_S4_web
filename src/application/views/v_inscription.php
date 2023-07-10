<!doctype html>
<html lang="en" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Sign Up</title>

        <link rel="stylesheet" id="css-main" href="<?php echo base_url().'asset/css/codebase.min.css'?>">

    </head>
    <body>
        <!-- Page Container -->
       
        <div id="page-container" class="main-content-boxed">
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="bg-image" style="background-image: url('asset/img/bg-login6.jpg');">
                    <div class="row mx-0 bg-black-op">
                        <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                            <div class="p-30 invisible" data-toggle="appear">
                                <p class="font-size-h3 font-w600 text-white">
                                    Welcome to NUTRIPLAN
                                </p>
                                <p class="font-italic text-white-op">
                                    Copyright &copy; <span class="js-year-copy"><?php echo date('Y');?></span>
                                </p>
                            </div>
                        </div>
                        <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
                            <div class="content content-full">
                                <!-- Header -->
                                <div class="px-30 py-10">
                                    <a class="link-effect font-w700" href="<?php echo base_url();?>">
                                        <i class=""></i>
                                        <span class="font-size-xl text-success">NUTRIPLAN</span>
                                    </a> 
                                    <h2 class="h5 font-w400 text-muted mb-0">Please sign up</h2>
                                </div>
                                <!-- END Header -->

                                <form class="js-validation-signin px-30" action="<?php echo base_url().'CPersonne/insertion'?>" method="post">
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="text" class="form-control" id="login-username" name="nom" required>
                                                <label for="login-username">Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="text" class="form-control" id="login-password" name="prenom" required>
                                                <label for="login-password">First Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label>Birth</label>
                                            <div class="form-material floating">
                                                <input type="date" class="form-control" id="login-password" name="dtn" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="radio" value="0" name="sexe" id="homme" checked="checked">
                                                <span style="padding-left: 5px;font-weight: normal;"> Masculin </span> 
                                                <input type="radio" value="1" name="sexe" id="femme" style="margin-left: 60px;">
                                                <span style="padding-left: 5px;font-weight: normal;"> Feminin </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="text" class="form-control" id="login-password" name="email" required>
                                                <label for="login-password">Email</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="password" class="form-control" id="login-password" name="mdp" required>
                                                <label for="login-password">Password</label>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-hero btn-alt-primary">
                                            <i class="si si-login mr-10"></i> Next
                                        </button>
                                        
                                    </div>
                                </form>
                                <!-- END Sign In Form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        <script src="<?php echo base_url().'asset/js/core/jquery.min.js'?>"></script>
        <script src="<?php echo base_url().'asset/js/core/popper.min.js'?>"></script>
        <script src="<?php echo base_url().'asset/js/core/bootstrap.min.js'?>"></script>
        <script src="<?php echo base_url().'asset/js/core/jquery.slimscroll.min.js'?>"></script>
        <script src="<?php echo base_url().'asset/js/core/jquery.scrollLock.min.js'?>"></script>
        <script src="<?php echo base_url().'asset/js/core/jquery.appear.min.js'?>"></script>
        <script src="<?php echo base_url().'asset/js/core/jquery.countTo.min.js'?>"></script>
        <script src="<?php echo base_url().'asset/js/core/js.cookie.min.js'?>"></script>
        <script src="<?php echo base_url().'asset/js/codebase.js'?>"></script>

        <!-- Page JS Plugins -->
        <script src="<?php echo base_url().'asset/js/plugins/jquery-validation/jquery.validate.min.js'?>"></script>

        <!-- Page JS Code -->
        <script src="<?php echo base_url().'asset/js/pages/op_auth_signin.js'?>"></script>
    </body>
</html>
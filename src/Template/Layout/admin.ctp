<!DOCTYPE html>
<html>
<head>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php

        // Show title
        echo $this->fetch('title');

        ?>
    </title>


    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('comments.css'); ?>
    <?= $this->Html->css('sb-admin-2.css') ?>
    <?= $this->Html->css('metismenu.min.css') ?>
    <?= $this->Html->css('/bower_components/datatables-responsive/css/responsive.dataTables.css') ?>
    <?= $this->Html->css('/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') ?>
    <?= $this->Html->css('lightbox.css') ?>
    <?= $this->Html->css('https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css') ?>
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Open+Sans:400,400i,400,400i,600,600i,700,700i') ?>
    <?= $this->Html->css('style.css'); ?>

    <?= $this->Html->css('plugins/summernote.css') ?>

    <?= $this->Html->script('/bower_components/datatables/media/js/jquery.dataTables.min.js') ?>
    <?= $this->Html->script('/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') ?>
    <?= $this->Html->script('https://code.jquery.com/jquery-2.2.4.min.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('https://code.jquery.com/ui/1.12.1/jquery-ui.min.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/js/lightbox.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/js/js.cookie.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/js/bootstrap.min.js', ['block' => 'scriptBottom']) ?>

    <?= $this->Html->script('/js/plugins/summernote.min.js', ['block' => 'scriptBottom']) ?>


    <?= $this->Html->script('/js/dropzone.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/js/bootstrap-editable.min.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/js/custom.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('/js/comments.js', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('jquery-validation.js') ?>
    <?= $this->Html->script('sb-admin-2.js', ['block' => 'scriptBottom']) ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="<?php echo ($this->fetch('bodyClass') ? : 'default'); ?>">
<div id="wrapper" class="<?php echo ($_expandMenu ? : "nav-closed"); ?>">

    <nav class="navbar navbar-default navbar-static-top" role="navigation">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="<?php echo $this->Url->build(['controller' => 'Pages', 'action' => 'home']); ?>"><img src="<?php echo $this->Url->build('/img/swoop-logo-white.png'); ?>"> <span class='env env-dev'>Staging</span>


            </a>

        </div>

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <?php echo $authUser->name; ?> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'logout']); ?>"><i
                                class="fa fa-sign-out fa-fw"></i> <?php echo __('Logout'); ?></a></li>
                </ul>
                <!-- /.dropdown-user -->
            </li>

        </ul>

        <div class="navbar-default sidebar <?php echo ($_expandMenu ? : "closed"); ?>" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <li class="teams">
                        <a href="<?php echo $this->Url->build(['controller' => 'teams', 'action' => 'index']); ?>"><i class="fa fa-money fa-fw"></i><span><?php echo __('Teams'); ?></span></a>
                    </li>
                    <li class="players">
                        <a href="<?php echo $this->Url->build(['controller' => 'players', 'action' => 'index']); ?>"><i class="fa fa-mobile-phone fa-fw"></i><span><?php echo __('Players'); ?></span></a>
                    </li>
                </ul>

                <ul class="nav toggle">
                    <li class="toggle-menu"><a href=""><i class="fa fa-chevron-right fa-fw"></i><i class="fa fa-chevron-left fa-fw"></i><span> Close Menu</span></a></li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper" class="nav-closed">

        <div class="wrap">

            <?= $this->Flash->render() ?>

            <?= $this->fetch('content') ?>

        </div>

    </div>

    <?= $this->fetch('scriptBottom'); ?>

</body>
</html>
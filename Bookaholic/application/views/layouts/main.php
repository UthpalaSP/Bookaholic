<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="<?php echo base_url("assets/images/favicon.png"); ?>">
    <meta charset="utf-8">
    <title>Bookaholic</title>

    <link rel="stylesheet" href="<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/inspinia/style.css"); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css"); ?>">

    <script type="text/javascript" src="<?php echo base_url("assets/vendor/jquery/jquery.min.js"); ?>"></script>
    <script type="text/javascript"
            src="<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/dist/js/sb-admin-2.js"); ?>"></script>


</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url(); ?>home/">Bookaholic</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo base_url(); ?>home/">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Categories <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php if ($this->session->has_userdata('categories')): ?>
                            <?php foreach ($this->session->userdata('categories') as $category): ?>
                                <?php echo "<li> <a value='$category->id' href='" . base_url() . "home/selected_books/$category->id' >" . $category->category_name . "</a></li>"; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div>


    </div>
</nav>


<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->load->view('side_nav'); ?>
        </div>
        <div class="col-md-9">
            <div>
                <?php $this->load->view($main_view); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="ibox-footer">
                Copyright 2018 by Bookaholic.
                Design template is from inspinia.
                <div class="ibox-footer">
                            <span class="pull-right">
                               Powered by Bookaholic
                            </span>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

</body>
</html>

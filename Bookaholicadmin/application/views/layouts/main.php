<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="<?php echo base_url("assets/images/favicon.png"); ?>">
    <meta charset="utf-8">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css"); ?>">

    <script type="text/javascript" src="<?php echo base_url("assets/vendor/jquery/jquery.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/dist/js/sb-admin-2.js"); ?>"></script>

</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url(); ?>home">Bookaholic</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="<?php echo base_url(); ?>home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>category/index">Categories</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>book/index">Books</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>auth/register">Register</a>
                </li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li>
                    <a href="<?php echo base_url(); ?>auth/logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->load->view('user/login_view'); ?>
        </div>
        <div class="col-md-9">
            <div class="">
                <?php $this->load->view($main_view); ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>

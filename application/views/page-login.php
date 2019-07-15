<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view("_partials/head.php") ?>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <!-- <a href="index.html"> -->
                        <img class="align-content" src="images/logo.jpg" alt="" width="60%">
                    <!-- </a> -->
                </div>
                <div class="login-form">
                    <form action="<?php echo site_url('Login/aksi_login');?>" method="post" >
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="email" class="form-control" placeholder="NIK" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>

                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view("_partials/js.php") ?>

</body>
</html>

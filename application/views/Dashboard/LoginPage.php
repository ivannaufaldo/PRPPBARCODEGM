<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font Awesomne -->
    <script src="https://kit.fontawesome.com/b1bd84d3f8.js" crossorigin="anonymous"></script>

    <style>
        body{
            background-color:#EDF2F3 ;
        	font-family: Arial, Helvetica, sans-serif;
            color: #000;
        }
        .card{
            background-color: #fff;
            padding: 10px;
            border-width: 0px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            border-radius: 5px;
        }
        h2{
            text-align: center;
            font-weight: 800;
            /* margin-top: 10px; */
            margin-bottom: 30px;
        }
        input {
            border: none;
            padding: 12px 15px;
        }
        #login{
            font-size: larger;
            font-weight: 700;
            border-width: 0;
            width: 100%;
            border-radius: 10px;
            /* background-color: #15abe8; */
            /* float: right; */
            color: #fff;
        }
        .form-control{
            box-shadow: none;
            border-radius: 0px 10px 10px 0px;
            border-top-width: 2px;
            border-bottom-width: 2px;
            border-left-width: 0px;
            border-right-width: 2px;
            border-color: #ebebeb;
            background-color: #fff;
            height: 40px;
        }
        .input-group-text{
            background-color: #fff;
            border-top-width: 2px;
            border-bottom-width: 2px;
            border-left-width: 2px;
            border-right-width: 0px;
            border-color: #ebebeb;
            border-radius: 10px 0px 0px 10px;
            /* border-width: 0; */
            border-right-color:#fff ;
        }
        .form-error{
            text-align: end;
        }
        .alert{
            margin-top: 10px;
            border-radius: 10px;
            margin-bottom: -10px;
            text-align: center;
        }
        hr{
            background-color: white;
            border-width: 1px;
        }
        #input1{
            margin-bottom: 15px;
        }
        #input2{
            margin-bottom: 15px;
        }
        /* #05427A */
    </style>

    <title>Login Dashboard</title>
  </head>
  <body>
    <div class="row justify-content-center" style="margin-top: 20vh;" >
        <div class="col-md-5">
            <div class="card">
                <!-- <div class="card-header">
                    Login
                </div> -->
                <div class="card-body">
                    <h2>Login Admin</h2>
                    <form action="<?php echo base_url('index.php/LoginDashboard/login_aksi') ?>" method="post">
                        <div id="input1">
                        <div class="input-group mb-1 ">
                            <span class="input-group-text" id="icon-username"><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="username" autocomplete="off" class="form-control" placeholder="username" value="<?= set_value('username') ?>">
                        </div>
                        <div class="form-error">
                            <small><span class="text-danger"><?= form_error('username'); ?></span></small>
                        </div>
                        </div>
                        <div id="input2">
                        <div class="input-group mb-1">
                            <span class="input-group-text" id="icon-password"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password" autocomplete="off" class="form-control" placeholder="password">
                        </div>
                        <div class="form-error">
                            <small><span class="text-danger"><?= form_error('password'); ?></span></small>    
                        </div>
                        </div>
                        <hr>
                        <input type="submit" class="btn btn-primary" value="Login" id="login"></input>
                    </form>
                    <div class="row">
                        <div class="col-md">
                            <?php if($this->session->flashdata('errorlogin')):?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $this->session->flashdata('errorlogin');?>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <p>@ivannaufaldo</p> -->
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>


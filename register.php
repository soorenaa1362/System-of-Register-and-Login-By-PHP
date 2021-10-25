<?php
    include 'config/database.php';
    include 'config/process.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Register</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-5">
                        <div class="login-wrap p-4 p-md-5">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-user-o"></span>
                            </div>
                            
                            <form method="post" class="login-form">
                                <div class="form-group">
                                    <input type="text" class="form-control rounded-left" name="username" 
                                        placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control rounded-left" name="mobile" 
                                        placeholder="Mobile" required>
                                </div>
                                <div class="form-group d-flex">
                                    <input type="password" class="form-control rounded-left" name="password" 
                                        placeholder="Password" required>
                                </div>
                                <div class="form-group d-flex">
                                    <input type="password" class="form-control rounded-left" name="passwordConf" 
                                        placeholder="PasswordConf" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="register" class="btn btn-primary rounded submit p-3 px-5">
                                        Register
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>

        <!-- Sweet Alert -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <?php if($errorPassword){ ?>
            <script>
                Swal.fire(
                    'لطفا دقت کنید!',
                    'رمز عبور با تکرار آن برابر نیست!',
                    'warning'
                )
            </script>
        <?php } ?>

    </body>
</html>

<?php
    include 'config/database.php';
    include 'config/process.php';
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Token</title>
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
                                    <input type="number" class="form-control rounded-left" name="token" 
                                        placeholder="Token" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="inserToken" class="btn btn-primary rounded submit p-3 px-5">
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

        <?php if($_GET['registerSuccess'] == true){ ?>
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: 'کد فعالسازی ارسال شد!'
                })
            </script>
        <?php } ?>

        <?php if($errorToken){ ?>
            <script>
                Swal.fire(
                    'لطفا دقت کنید!',
                    'کد وارد شده اشتباه است!',
                    'warning'
                )
            </script>
        <?php } ?>

        <?php if($_GET['noActive'] == true){ ?>
            <script>
                Swal.fire(
                    'دقت داشته باشید!',
                    'ابتدا باید پنل خود را فعال کنید!',
                    'warning'
                )
            </script>
        <?php } ?>

    </body>
</html>

<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<?php
    if(isset($_POST['simpan'])){
    mysqli_query($con,"insert into admin(`username`,`password`)values('$_POST[username]','$_POST[password]')");
    echo "<script>alert('tersimpan');</script>";
        echo "<script>document.location.href='?utama'</script>";
    }
                                ?>

<body class="bg-gradient-primary">
    <form method="POST">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Kelola User</h1>
                            </div>
                            <form class="user">
                                
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="username" class="form-control form-control-user" id="exampleInputPassword" placeholder="Username" value="<?php echo @$dit['username']?>">
                                    </div>
                                <div class="col-sm-6">
                                        <input type="password" name="password" class="form-control form-control-user"  
                                            id="exampleRepeatPassword" placeholder="Password" value="<?php echo @$dit['password']?>">
                                    </div>
                                </div>
                                
                                <div>
                                   
                                        
                                        <input type="submit" name="simpan" value="simpan" class="btn btn-primary btn-user btn-block">
                                        <a href="index.php" class="btn btn-google btn-user btn-block">
                                             Login
                                        </a>
                                    
                                </div>
                                
                                
                                
                                
                                
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </form>
   

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<?php 
@session_start();
include "koneksi.php";
 ?>
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

    
    
    mysqli_query($con,"insert into buku(`judul`, `penerbitID`, `pengarang`)values('$_POST[judul]', '$_POST[penerbitID]', '$_POST[pengarang]')");
     echo "<script>alert('tersimpan');</script>";
     echo "<script>document.location.href='?buku'</script>";

    }


    if (isset($_GET['edit'])){
     $e=mysqli_query($con,"select * from buku where bukuID = '$_GET[id]'");
    $dit=mysqli_fetch_array($e);
     }
     if (isset($_GET['hapus'])){
     mysqli_query($con,"delete from buku where bukuID = '$_GET[id]'");
     echo "<script>alert('data terhapus')</script>";
    echo "<script>document.location.href='?buku'</script>";
    } 
    if (isset($_POST['update'])){


    mysqli_query($con,"update buku set  judul='$_POST[judul]', penerbitID='$_POST[penerbitID]', pengarang='$_POST[pengarang]'   where buku='$_GET[id]'");
    echo "<script>alert('data terubah')</script>";
     echo "<script>document.location.href='?buku'</script>";
    }
?>

<body class="bg-gradient-primary">
    <form method="POST" enctype="multipart/form-data">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Kelola  Buku</h1>
                            </div>
                            <form class="user">
                                <div class="form-group row">
                                    <div class="col-sm-5 mb-3 mb-sm-0">
                                        <input type="text" name="judul" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="judul buku" value="<?php echo @$dit['judul']?>">
                                    </div>

                                    <label>Penerbit : </label>
                                   <div class="col-sm-6">
                                         <select name="penerbitID" class="form-control form-control-user" id="exampleLastName"  placeholder="ID penerbit">
                                            <?php
                                             $x=mysqli_query($con,"select * from penerbit");
                                             while($y=mysqli_fetch_array($x)){
                                            ?>
                                            <option value="<?php echo @$y['penerbitID']?>"<?php 
                                        if(@$_POST['penerbitID']==@$y['penerbitID']) echo "selected='selected'";
                                    elseif(@$y['penerbitID']==@$dit['penerbitID']) echo "selected='selected'";
                                
                                        ?>><?php echo @$y['penerbit'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="text" name="pengarang" class="form-control form-control-user"   id="exampleRepeatPassword" placeholder="pengarang" value="<?php echo @$dit['pengarang']?>">
                                    </div>
                                </div>
                                
                                
                                <div>
                                   
                                    <?php
                                        if (isset($_GET['edit'])){ ?>
                                        <input type="submit" name="update" value="update" class="btn btn-primary btn-user btn-block">
                                    <?php }else{?>
                                        <input type="submit" name="simpan" value="simpan" class="btn btn-primary btn-user btn-block">
                                    <?php } ?>
                                </div>
                                
                                
                                
                                
                                
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </form>
    <div class="container-fluid">

                    <!-- Page Heading -->
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Buku</th>
                                            <th>Judul Buku</th>
                                            <th>ID Penerbit</th>
                                            <th>Pengarang</th>
                                            <th>Pilihian</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Buku</th>
                                            <th>Judul Buku</th>
                                            <th>ID Penerbit</th>
                                            <th>Pengarang</th>
                                            <th>Pilihian</th>

                                        </tr>
                                    </tfoot>
                                    
                                    <tbody>
                                        <?php
                                    $sql=mysqli_query($con,"select * from buku");
            
                
                                     $no=0;
                                     while($data=mysqli_fetch_array($sql)){
                                     $no++;
           
                                    ?>
                                         <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo @$data['bukuID']?></td>
                                            <td><?php echo @$data['judul']?></td>
                                            <td><?php echo @$data['penerbitID']?></td>
                                            <td><?php echo @$data['pengarang']?></td>
                                            <td> <a href="?buku&hapus&id=<?php echo $data['bukuID']?>">Hapus</a>|<a href="?buku&edit&id=<?php echo $data['bukuID']?>">Edit</a></td>
                                        </tr> <?php } ?>
                                    </tbody>
                               
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
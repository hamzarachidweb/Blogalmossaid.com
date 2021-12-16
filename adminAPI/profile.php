<?php include('head.php');

 ?>

<div class="container-fluid my-4">
    <div class="row my-4">
        <div class="col-md-12 my-4"></div>
    </div>
</div>


<div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">لوحة القيادة</h1>
             <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user fa-sm text-white-50"></i> 
                <?php echo $_SESSION['login']['role']; ?>
             </a>
        </div>


<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-end">الملف الشخصي </h6>
            </div>

      <div class="card-body">     
<fieldset disabled>

<form class="user"  method="post" enctype="multipart/form-data">

    <div class="form-group row my-4">

        <div class="col-sm-6 mb-3 mb-sm-0">
            <input  class="form-control"  type="text" name="fullname" value="<?php echo $_SESSION['login']['fullname']; ?>" autocomplete="off" class="box"/>
        </div>

        <div class="col-sm-6">
            <input class="form-control"  type="text" name="username" value="<?php echo $_SESSION['login']['username']; ?>" autocomplete="off" class="box"/>
        </div>
    </div>

    <div class="form-group row my-4">

        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" name="email"  class="form-control" value="<?php echo $_SESSION['login']['email']; ?>" class="box"/>
        </div>

   </div>


</form>
</fieldset>

    </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php include('footer.php'); ?>
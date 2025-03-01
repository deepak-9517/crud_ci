<?php include('header.php');
$validation = \Config\Services::validation();
?>
<div class="container w-50 border mt-5">
    <?php if(session()->getFlashdata( 'success' )) : ?>
        <div class="alert alert-success" role="alert">
            <?=session()->getFlashdata( 'success' )?>
        </div>
        <?php endif ?>
    <h1 class="mt-5 text-center">Register</h1>
<form class="border p-3" action="<?=base_url()?>register/user" method="post"  enctype="multipart/form-data">
  <div class="mb-3 ">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
        <p class="text-danger"><?=$validation->getError('name'); ?></p> 
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" >
    <p class="text-danger"><?=$validation->getError('email'); ?></p>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">DOB</label>
    <input type="date" class="form-control" id="dob" name="dob">
    <p class="text-danger"><?=$validation->getError('dob'); ?></p>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">File</label>
    <input type="file" class="form-control" id="image" name="image">
    <p class="text-danger"><?=$validation->getError('image'); ?></p>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">password</label>
    <input type="password" class="form-control" id="password" name="password">
    <p class="text-danger"><?=$validation->getError('password'); ?></p>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<?php include('footer.php');?>
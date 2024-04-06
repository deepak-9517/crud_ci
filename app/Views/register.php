<?php include('header.php')?>

<div class="container w-50 border mt-5">
    <h1 class="mt-5 text-center">Register</h1>
<form class="border p-3">
  <div class="mb-3 ">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">DOB</label>
    <input type="date" class="form-control" id="dob" name="dob">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">File</label>
    <input type="file" class="form-control" id="image" name="image">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<?php include('footer.php');?>
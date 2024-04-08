<?php include('header.php')?>
<div class="float-end m-5">
    <a href="<?=base_url()?>register" class="btn btn-dark text-white">Add User</a>
</div>
<div class="container mt-5">
          <?php if(session()->getFlashdata( 'success' )) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?=session()->getFlashdata( 'success' )?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif ?>
<table class="table border">
  <thead >
    <tr class="table-dark">
      <th scope="col">S.no</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">DOB</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $id=0;
    foreach($record as $data):?>
    <tr>
      <th scope="row"><?=++$id?></th>
      <td><?=$data['name']?></td>
      <td><?=$data['email']?></td>
      <td><?=$data['dob']?></td>
      <td><img src="<?= base_url('uploads/' . $data['image']); ?>" alt="" hight="80" width="80"></td>
      <td><a href="<?=base_url()?>user-edit/<?=$data['id']?>" class="btn btn-success btn-sm">Update</a>
      <button class="btn btn-danger btn-sm ms-3" onclick="confirmDelete()">Delete</button></td>
      <!-- <a href="<?=base_url()?>user-delete/<?=$data['id']?>" class="btn btn-danger btn-sm ms-3" onclick="confirmDelete()">Delete</a></td> -->
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
<script>
  function confirmDelete(){
    if(confirm('Do You Want to Delete..?')){
        window.location.href="<?=base_url()?>user-delete/<?=$data['id']?>";
    }
  }
</script>
</div>
<?php include('footer.php')?>
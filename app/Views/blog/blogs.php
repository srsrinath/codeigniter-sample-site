<?= $this->extend('layout/main')?>
<?= $this->section('content')?>
<h2><?= $title ?></h2>
<hr>

<div class="container">
    <div class="row">
<?php foreach($blogs as $post) : ?>
    <div class="col-3 p-3">         
        <div class="card" style="width: 18rem;">
  <img src="<?="./uploads/posts/".$post['image'];?>"class=" card-img-top" alt="Image">
       <div class="card-body">
    <p class="card-text"><?= $post['description'] ?></p>
  </div>
  
  <div class="card-body">
  <a href="<?=base_url('edit/'.$post['id']);?>" class="btn btn-success btn-sm">Edit</a>
<a href="<?=base_url('delete/'.$post['id']);?>" class="btn btn-danger btn-sm">Delete</a>
</div>     
  </div>
</div>
    <?php endforeach; ?>
</div>
</div>
<?= $this->endsection();?>

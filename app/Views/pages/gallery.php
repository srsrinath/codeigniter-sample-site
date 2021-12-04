<?= $this->extend('layout/main')?>
<?= $this->section('content')?>
<h2><?= $title ?></h2>
<hr>

<div class="container">
<?php foreach($photos as $img) : ?> 
<img src="<?="./uploads/".$img['image'];?>"alt="Image" height="100px" width="100px">
<?php endforeach; ?>
</div>

<?= $this->endsection();?>
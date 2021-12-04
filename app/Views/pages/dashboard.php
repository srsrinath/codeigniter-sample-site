<?= $this->extend('layout/main')?>
<?= $this->section('content')?>
<div class="bg-light py-5">
<center><h3>welcome to your homepage  <?=session()->get('name') ?></h3>
</center>
</div>
<?= $this->endsection();?>
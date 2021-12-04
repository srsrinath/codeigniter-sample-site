<?= $this->extend('layout/main')?>
<?= $this->section('content')?>
<div class="container">

    <div class="text-center">
        <h2><?= $title ?></h2>
        <hr>

    </div>
    <div class="row">
        <div class="col-md-4 offset-md-4">
          
        <form method="post" action="">
        <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control <?= $validation->hasError('name') ? 'is-invalid' : '' ?>" 
                    value="<?= old('name') ?>" id="name" name="name">
                    <span class="invalid-feedback">
                    <?php if ($validation->hasError('name')) echo $validation->getError('name'); ?>
                    </span>
                </div>
                    
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="text"  class="form-control <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" 
                    value="<?= old('email') ?>" id="email" name="email">
                    <span class="invalid-feedback">
                    <?php if ($validation->hasError('email')) echo $validation->getError('email'); ?>
                    </span>
        </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input  type="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" 
                    value="<?= old('password') ?>" id="password" name="password">
                    <span class="invalid-feedback">
                    <?php if ($validation->hasError('password')) echo $validation->getError('password'); ?>
                    </span>  
            
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control <?= $validation->hasError('confirmpassword') ? 'is-invalid' : '' ?>" 
                    value="<?= old('confirmpassword') ?>" id="confirmpassword" name="confirmpassword">
                    <span class="invalid-feedback">
                    <?php if ($validation->hasError('confirmpassword')) echo $validation->getError('confirmpassword'); ?>
                    </span>
        
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>

</div>  
<?= $this->endsection();?>
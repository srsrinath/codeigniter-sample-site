<?= $this->extend('layout/main')?>
<?= $this->section('content')?>
<div class="container">
    <div class="text-center">
        <h2><?= $title ?></h2>
        <hr>

    </div>
    <div class="row">
        <div class="col-md-4 offset-md-4">
        <?php if (session()->get('success')) : ?>
                <div class="alert alert-success" role="alert">
                <?= session()->get('success')?>
            </div>
            <?php endif; ?>
        
        <form method="post" action=" ">
                    
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
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>

</div>  
<?= $this->endsection();?>
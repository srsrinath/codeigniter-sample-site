<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $meta_title ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid ">
    <a class="navbar-brand " href="/">Simple Codeigniter Site</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php if (session()->get('isLoggedIn')): ?>
    
<ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">

        <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
            data-bs-toggle="dropdown" aria-expanded="false">PhotoGrid</a>
						<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="<?= base_url('upload') ?>">Upload</a></li>
							<li><a class="dropdown-item" href="<?= base_url('gallery') ?>">Gallery</a></li>
							<li>
        </ul>
        <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
            data-bs-toggle="dropdown" aria-expanded="false">Posts</a>
						<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="<?= base_url('post') ?>">CreatePost</a></li>
							<li><a class="dropdown-item" href="<?= base_url('blogs') ?>">Blogs</a></li>
							<li>
        </ul>
        
        <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
            data-bs-toggle="dropdown" aria-expanded="false">
							<?= session()->get('name') ?>
						</a>
						<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="<?= base_url('profile') ?>">Profile</a></li>
							<li><a class="dropdown-item" href="<?= base_url('changepassword') ?>">Change Password</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
              <li class="nav-item">
          <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
        </li>	
      	</ul>
					</li>
      </ul>
    <?php else: ?>
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
        <li class="nav-item ">
          <a class="nav-link" aria-current="page" href="<?= base_url() ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('about') ?>">About</a>
        </li>    
        
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('contact') ?>">Contact us</a>
        </li>    
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('gallery') ?>">Gallery</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('blogs') ?>">Blogs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('login') ?>">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('register') ?>">Register</a>
        </li>
            
      </ul>
    </div>
    <?php endif; ?>
  </div>
</nav>
<div class="container">
    <?= $this -> rendersection('content');?>
    
</div>
<footer class="footer mt-auto py-3 bg-info text-light">
    <div class="container text-center">
        <p>Simple Codeigniter App made with <a href="https://getbootstrap.com/">Bootstrap 5</a> by @Srinath</a>.</p>
        <p>
            <a href="#">Back to top</a>
    </div>
</footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script> -->

<script src="assets/js/app.js"></script>

    </body>
</html>
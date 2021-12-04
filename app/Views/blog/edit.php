<?= $this->extend('layout/main')?>
<?= $this->section('content')?>
<h2><center><?= $title ?><center></h2>

<hr>
<form class="mt-5 mb-5" action="<?=base_url('update/'.$post['id']);?>" method="post" enctype="multipart/form-data">


            <div class="mb-3">
                <label for="formFile" class="form-label">Upload a image:</label>
                <input class="form-control <?= $validation->hasError('image') ? 'is-invalid' : '' ?>" 
                    value="<?= old('image') ?>" type="file" name="image" id="formFile">
                    <span class="invalid-feedback">
                    <?php if ($validation->hasError('image')) echo $validation->getError('image'); ?>
                    </span>
                <img src="<?="../uploads/posts/".$post['image']; ?>" height="100px" width="100px"> 
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Description</label>
                <textarea class="form-control <?= $validation->hasError('description') ? 'is-invalid' : '' ?>"
                 type="text" name="description" rows="3">  <?= $post['description'] ?><?= old('description') ?>
               </textarea>
                 <span class="invalid-feedback">
                    <?php if ($validation->hasError('description')) echo $validation->getError('description'); ?>
                    </span>
                
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        <?= $this->endsection();?>

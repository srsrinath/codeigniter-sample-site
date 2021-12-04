<?php namespace App\Models; 

 use CodeIgniter\Model;

 class GalleryModel extends Model{
     protected $table='photos';
     protected $allowedFields=['image'];

 }
 ?>
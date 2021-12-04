<?php namespace App\Models; 

 use CodeIgniter\Model;

 class Usermodel extends Model{
     protected $table ='students';
     protected $allowedFields =['name','email','password','confirmpassword'];
    //  protected $allowCallbacks       = true;
    //  protected $beforInsert =['beforeInsert'];
    //  protected $beforeUpdate =['beforeUpdate'];

    // protected $DBGroup              = 'default';
	// protected $table                = 'students';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'object';
	// // protected $useSoftDeletes       = true;
	// // protected $protectFields        = true;
	// protected $allowedFields        = ['name', 'email', 'password','confirmpassword'];

	// Dates
	// protected $useTimestamps        = false;
	// protected $dateFormat           = 'datetime';
	// protected $createdField         = 'created_at';
	// protected $updatedField         = 'updated_at';
	// protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = ['beforeInsert'];
	protected $afterInsert          = [];
	protected $beforeUpdate         = ['beforeUpdate'];
	protected $afterUpdate          = ['afterUpdate'];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];
     
    protected function beforeInsert(array $data){
        return $this->passwordhash($data);
        //return $data;
    }

    protected function beforeUpdate(array $data){
        $data=$this->passwordhash($data);
        return $data;
    }

    protected function passwordhash(array $data){
        //dd($data);
        if(isset($data['data']['password'])){
            $data['data']['password']=password_hash($data['data']['password'],PASSWORD_DEFAULT);
        } 
        //dd($data);    
        return $data;
    }

 
}
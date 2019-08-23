<?php
namespace Model;
require_once __DIR__ . '/../boot/load.php';

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id'; 

    protected $with = ['organization'];

    protected $fillable = ['username', 'password', 'email', 'phone', 'firstname', 'lastname', 'organization_id', 'age', 'status'];

    public function organization()
    {
        return $this->belongsTo('Model\OrganizationModel');
    }
}

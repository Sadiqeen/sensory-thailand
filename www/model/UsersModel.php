<?php
namespace Model;
require_once __DIR__ . '/../boot/load.php';

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id'; 

    protected $fillable = ['username', 'password', 'email'];
}

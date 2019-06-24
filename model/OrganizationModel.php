<?php
namespace Model;
require_once __DIR__ . '/../boot/load.php';

use Illuminate\Database\Eloquent\Model;

class OrganizationModel extends Model
{
    protected $table = 'organizations';

    protected $primaryKey = 'id'; 

    protected $fillable = ['name', 'tel', 'email'];
}

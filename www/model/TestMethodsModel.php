<?php
namespace Model;
require_once __DIR__ . '/../boot/load.php';

use Illuminate\Database\Eloquent\Model;

class TestMethodsModel extends Model
{
    protected $table = 'test_methods';

    protected $primaryKey = 'id'; 

    protected $fillable = ['name'];
}
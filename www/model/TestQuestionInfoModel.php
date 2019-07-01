<?php
namespace Model;
require_once __DIR__ . '/../boot/load.php';

use Illuminate\Database\Eloquent\Model;

class TestQuestionInfoModel extends Model
{
    protected $table = 'test_question_info';

    protected $primaryKey = 'id'; 

    protected $fillable = ['name', 'info', 'cover', 'method', 'organization', 'test_template_info_id'];
}
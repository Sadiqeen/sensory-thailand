<?php
namespace Model;
require_once __DIR__ . '/../boot/load.php';

use Illuminate\Database\Eloquent\Model;

class TestQuestionsModel extends Model
{
    protected $table = 'test_questions';

    protected $primaryKey = 'id'; 

    protected $fillable = ['test_question_info_id', 'test_template_question_id', 'image'];
}
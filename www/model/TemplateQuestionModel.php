<?php
namespace Model;
require_once __DIR__ . '/../boot/load.php';

use Illuminate\Database\Eloquent\Model;

class TemplateQuestionModel extends Model
{
    protected $table = 'test_template_question';

    protected $primaryKey = 'id'; 

    protected $fillable = ['template_id', 'question'];
}
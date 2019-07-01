<?php
namespace Model;
require_once __DIR__ . '/../boot/load.php';

use Illuminate\Database\Eloquent\Model;

class TestTemplateInfoModel extends Model
{
    protected $table = 'test_template_info';

    protected $primaryKey = 'id';

    protected $with = ['questions'];

    protected $fillable = ['template_name', 'question_quantity'];

    public function questions()
    {
        return $this->hasMany('Model\TemplateQuestionModel', 'template_id');
    }
}


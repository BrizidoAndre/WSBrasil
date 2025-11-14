<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use yii\console\widgets\Table;

/**
 * This controller it was me that was created
 */
class TesteController extends Controller
{
    public function actionIndex()
    {
        echo Table::widget([
            'headers' => ['Name', 'Age'],
            'rows' => [
                ['André', '20'],
                ['Lucas', '24'],
                ['Arthur', '18'],
            ]
        ]);
        return ExitCode::OK;
    }

    public function actionCreate()
    {
        return 'banana';
    }
}

<?php

namespace app\bases;


use yii\captcha\CaptchaAction;

class CaptchaNumbers extends CaptchaAction
{

    protected function generateVerifyCode()
    {
        $numbers = '1234567890';
        $length = 5;
        $code = '';
        for ($i = 0; $i < $length; ++$i) {
            $code .= $numbers[random_int(0, 9)];
        }

        return $code;
    }
}

<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
  public function behaviors()
  {
    return [
      'ghost-access' => [
        'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
      ],
    ];
  }
}

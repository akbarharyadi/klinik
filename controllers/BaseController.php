<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use webvimark\modules\UserManagement\models\User;
use yii\web\ForbiddenHttpException;

class BaseController extends Controller
{
  public function beforeAction($action)
	{

		if ( Yii::$app->user->isGuest )
		{
			$this->denyAccess();
		}

		// If user has been deleted, then destroy session and redirect to home page
		if ( ! Yii::$app->user->isGuest AND Yii::$app->user->identity === null )
		{
			Yii::$app->getSession()->destroy();
			$this->denyAccess();
		}

		// Superadmin owns everyone
		if ( Yii::$app->user->isSuperadmin )
		{
			return true;
		}

		if ( Yii::$app->user->identity AND Yii::$app->user->identity->status != User::STATUS_ACTIVE)
		{
			Yii::$app->user->logout();
			Yii::$app->getResponse()->redirect(Yii::$app->getHomeUrl());
		}

		//$this->denyAccess();
    $pegawai = \app\models\Pegawai::findOne(['user_id' => Yii::$app->user->identity->id]);
    if(Yii::$app->controller->id == 'pasien'){
      if ($pegawai->tipe != 0){
        throw new \yii\web\ForbiddenHttpException(Yii::t('yii', 'Anda tidak diperbolehkan melakukan akses ini.'));
      }
    }
    if(Yii::$app->controller->id == 'pegawai' or Yii::$app->controller->id == 'poli'){
      if (!Yii::$app->user->isSuperadmin){
        throw new \yii\web\ForbiddenHttpException(Yii::t('yii', 'Anda tidak diperbolehkan melakukan akses ini.'));
      }
    }
		return true;
	}

  protected function denyAccess()
	{
		if ( Yii::$app->user->getIsGuest() )
		{
			if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){
				Yii::$app->user->loginRequired(Yii::$app->request->isAjax, (strpos(Yii::$app->request->headers->get('Accept'), 'html') !== false));
			} else {
				Yii::$app->user->loginRequired();
			}

		}
		else
		{
			throw new \yii\web\ForbiddenHttpException(Yii::t('yii', 'Anda Tidak diperbolehkan melakukan aksi ini.'));
		}
	}
}

<?php

namespace app\controllers;

class UserController extends \webvimark\modules\UserManagement\controllers\UserController
{
  public function actionIndex() {
    $searchModel  = $this->modelSearchClass ? new $this->modelSearchClass : null;

		if ( $searchModel )
		{
			$dataProvider = $searchModel->search(\Yii::$app->request->getQueryParams());
		}
		else
		{
			$modelClass = $this->modelClass;
			$dataProvider = new ActiveDataProvider([
				'query' => $modelClass::find(),
			]);
		}

		return $this->renderIsAjax('@app/views/user/index', compact('dataProvider', 'searchModel'));
  }
}
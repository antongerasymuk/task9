<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller {

    public function actionInit() {
       
        $auth = Yii::$app->authManager;
        $auth->removeAll(); 
        
        $admin = $auth->createRole('admin');
        $user = $auth->createRole('user');
        
        $auth->add($admin);
        $auth->add($user);
        
        $viewRows = $auth->createPermission('viewRows');
        $viewRows->description = 'Veiw rows';
        
        $updateRows = $auth->createPermission('updateRows');
        $updateRows->description = 'Update rows';
        
        
        $auth->add($viewRows);
        $auth->add($updateRows);
        
        $auth->addChild($user,$viewRows);
        $auth->addChild($admin, $user);
        $auth->addChild($admin, $updateRows);
      
        $auth->assign($admin, 4); 
        $auth->assign($user, 5);
    }
}
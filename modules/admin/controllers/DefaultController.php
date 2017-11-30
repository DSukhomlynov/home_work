<?php

namespace app\modules\admin\controllers;

use app\models\Settings;
use yii\web\ForbiddenHttpException;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends AppAdminController
{

    public $layout = 'admin';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCache()
    {
        if (\Yii::$app->request->isAjax) {
            if (empty(\Yii::$app->request->post('type'))) {
                return false;
            }
            $rez = $this->saveCache(\Yii::$app->request->post('type'));
            if (!$rez) {
                return \Yii::$app->session->getFlash('undefined');
            }
            return \Yii::$app->session->getFlash('success');
        }
        return $this->render('cache');
    }

    public function actionAdminLog() {
        $admin_panel_log = \Yii::$app->cache->get('AP_log');
        if ($admin_panel_log === false) {
            $admin_panel_log = \Yii::$app->cache->set('AP_log', '');
        }
        return $this->render('admin-log', compact('admin_panel_log'));
    }

    private function saveCache($type, $time = 3600)
    {
        switch ($type) {
            case 'settings':
                $settings = Settings::find()->asArray()->all();
                foreach ($settings as $setting) {
                    \Yii::$app->cache->delete('setting_'.$setting['name']);
                    \Yii::$app->cache->add('setting_'.$setting['name'], $setting['value'], $time);
                }
                \Yii::$app->session->setFlash('success', 'Настройки успешно закэшированы');
                break;
            default:
                \Yii::$app->session->setFlash('undefined', 'Неизвестный тип');
                return false;
        }
        return true;
    }

    public function actionLogout()
    {
        \Yii::$app->user->logout();

        return $this->goHome();
    }

}

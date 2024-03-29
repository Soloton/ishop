<?php


namespace app\controllers;


use app\models\CartModel;

class CurrencyController extends AppController
{
    public function changeAction()
    {
        $currency = !empty($_GET['curr']) ? $_GET['curr'] : null;
        if ($currency) {
            $curr = \R::findOne('currency', 'code=?', [$currency]);
            if (!empty($curr)) {
                setcookie('currency', $currency, time() + 3600 * 24 * 7, '/');
                CartModel::recalculate($curr);
            }
        }
        redirect();
    }
}

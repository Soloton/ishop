<?php

namespace app\models;

use ishop\App;

class CartModel extends AppModel
{
    public function addToCart($product, $qty = 1, $mod = null)
    {
        if (!isset($_SESSION['cart.currency'])) {
            $_SESSION['cart.currency'] = App::$app->getProperty('currency');
        }
        if ($mod) {
            $ID = "{$product->id}-{$mod->id}";
            $title = "[$product->title} ({$mod->title})";
            $price = $mod->price;
        } else {
            $ID = $product->id;
            $title = $product->title;
            $price = $product->price;
        }
        if (isset($_SESSION['cart'][$ID])) {
            $_SESSION['cart'][$ID]['qty'] += $qty;
        } else {
            $_SESSION['cart'][$ID] = [
                'qty' => $qty,
                'title' => $title,
                'alias' => $product->alias,
                'price' => $price * $_SESSION['cart.currency']['value'],
                'img' => $product->img
            ];
        }

        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $sum = $qty * $price * $_SESSION['cart.currency']['value'];
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $sum : $sum;

    }

    public function deleteItem($id)
    {
        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sumMinus = $qtyMinus * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sumMinus;
        unset($_SESSION['cart'][$id]);
    }

    public static function recalculate($curr)
    {
        if (isset($_SESSION['cart.currency'])) {
            $currencyValue = $_SESSION['cart.currency']['value'];
            $newCurrencyValue = $curr->value;
            $_SESSION['cart.sum'] = $_SESSION['cart.sum'] / $currencyValue * $newCurrencyValue;

            foreach ($_SESSION['cart'] as $k => $v) {
                $_SESSION['cart'][$k]['price'] = $_SESSION['cart'][$k]['price'] / $currencyValue * $newCurrencyValue;
            }

            foreach ($curr as $k => $v) {
                $_SESSION['cart.currency'][$k] = $v;
            }
        }
    }
}

<?php


namespace app\controllers;


use app\models\BreadcrumbsModel;
use app\models\ProductModel;
use http\Exception\InvalidArgumentException;
use R;

class ProductController extends AppController
{
    public function viewAction()
    {
        $alias = $this->route['alias'];
        $product = R::findOne('product', 'status="1" AND alias=?', [$alias]);
        if (!$product) {
            throw new InvalidArgumentException('Страница не найдена', 404);
        }

        // breadcrumbs here
        $breadcrumbs = BreadcrumbsModel::getBreadcrumbs($product->category_id, $product->title);

        // related products
        $related = R::getAll("SELECT * FROM related_product JOIN product ON product.id=related_product.related_id 
            WHERE related_product.product_id=?", [$product->id]);

        // current product to cookie
        $p_model = new ProductModel();
        $p_model->setRecentlyViewed($product->id);

        // get products from cookies
        $r_viewed = $p_model->getRecentlyViewed();
        $recentlyViewed = null;
        if ($r_viewed) {
            $recentlyViewed = R::find('product', 'id IN (' . R::genSlots($r_viewed) . ') LIMIT 3', $r_viewed);
        }

        // gallery
        $gallery = R::findAll('gallery', 'product_id = ?', [$product->id]);

        // product modification
        $mods = R::findAll('modification', 'product_id = ?', [$product->id]);
//        debug($mods);

        $this->setMeta($product->title, $product->description, $product->keywords);
        $this->set(compact('product', 'related', 'gallery', 'recentlyViewed', 'breadcrumbs', 'mods'));
    }
}

<?php


namespace app\controllers;


use ishop\Cache;

class MainController extends AppController
{
    public function indexAction()
    {
        $posts = \R::findAll('test');
        $post = \R::findOne('test', 'id = ?', [2]);
        $this->setMeta('Главная страница', 'Описание ...', 'Ключевики...');
        $name = 'John';
        $age = 55;
        $names = ['1', '222', 'Mike'];
//        Cache::set('test', $names);
//        Cache::delete('test');
        $data = Cache::get('test');
        if(!$data){
            Cache::set('test', $names);
        }

        debug($data);
        $this->set(compact('name', 'age', 'names', 'posts'));
    }
}

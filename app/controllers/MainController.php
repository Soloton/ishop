<?php


namespace app\controllers;


class MainController extends AppController
{
    public function indexAction()
    {
        $posts = \R::findAll('test');
        $post = \R::findOne('test', 'id = ?', [2]);
        $this->setMeta('Главная страница', 'Описание ...', 'Ключевики...');
        $name = 'John';
        $age = 55;
        $names = ['1', '222'];
        $this->set(compact('name', 'age', 'names', 'posts'));
    }
}

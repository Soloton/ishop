<?php


namespace app\widgets\menu;


use ishop\App;
use ishop\Cache;

class Menu
{
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl;
    protected $container = 'ul';
    protected $class = 'menu';
    protected $table = 'category';
    protected $cache = 3600;
    protected $cacheKey = 'ishop_menu';
    protected $attrs = [];
    protected $prepend = '';

    /**
     * Menu constructor.
     * @param array $options
     */
    public function __construct($options = [])
    {
        $this->tpl = __DIR__ . '/menu_tpl/menu.php';
        $this->getOptions($options);
//        debug($this->table);
        $this->run();
    }

    /**
     * @param $options
     */
    protected function getOptions($options)
    {
        foreach ($options as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function run()
    {
        $this->menuHtml = Cache::get($this->cacheKey);
        if (!$this->menuHtml) {
            $this->data = App::$app->getProperty('cats');
            if (!$this->data) {
                $this->data = \R::getAssoc("SELECT * FROM {$this->table}");
            }
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);
            if ($this->cache) {
                Cache::set($this->cacheKey, $this->menuHtml, $this->cache);
            }
        }
        $this->output();
    }

    protected function output()
    {
        $attrs = '';
        if (!empty($this->attrs)) {
            foreach ($this->attrs as $key => $value) {
                $attrs .= " $key='$value' ";
            }
        }
        echo "<{$this->container} class='{$this->class}' {$attrs}>";
        echo $this->prepend;
        echo $this->menuHtml;
        echo "</{$this->container}>";
    }

    /**
     * @return array
     */
    protected function getTree()
    {
        $tree = [];
        $data = $this->data;
        foreach ($data as $id => &$node) {
            if (!$node['parent_id']) {
                $tree[$id] = &$node;
            } else {
                $data[$node['parent_id']]['children'][$id] = &$node;
            }
        }
        return $tree;
    }

    /**
     * @param $tree
     * @param string $tab
     */
    protected function getMenuHtml($tree, $tab = '')
    {
        $str = '';
        foreach ($tree as $id => $category) {
            $str .= $this->catToTemplate($category, $tab, $id);
        }
        return $str;
    }

    /**
     * @param $category
     * @param $tab
     * @param $id
     * @return false|string
     */
    protected function catToTemplate($category, $tab, $id)
    {
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }
}

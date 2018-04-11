<?php

namespace eshop\base;

class View {

    public $route;
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = [];

    public function __construct($route, $layout = '', $view = '', $meta) {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $view;
        $this->prefix = $route['prefix'];
        $this->meta = $meta;
        
        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }
    }

    public function render($data) {
        if(is_array($data)) extract($data); // create template variables from $data array

        $viewFile = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";

        if(is_file($viewFile)) {
            // put output into buffer
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean(); // $content will be available in template
        } else {
            throw new \Exception("View {$viewFile} not found", 500);
        }

        if($this->layout !== false) {
            $layoutFile = APP . "/views/templates/{$this->layout}.php";
            if(is_file($layoutFile)) {
                require_once $layoutFile;
            } else {
                throw new \Exception("Template {$this->layout} not found", 500);
            }
        }
    }

    public function getMeta(): string {
        $output = '<title>' . $this->meta['title'] . '</title>' . PHP_EOL;
        $output .= '    <meta name="description" content="' . $this->meta['desc'] . '">' . PHP_EOL;
        $output .= '    <meta name="keywords" content="' . $this->meta['keywords'] . '">' . PHP_EOL;
        return $output;
    }
}
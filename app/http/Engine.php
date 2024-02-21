<?php

namespace app\http;

use Exception;
class Engine{

    private ?string $layout;
    private ?string $content;
    private array $data;
    private array $dependecies;
    private function load(){
        
        return !empty($this->content) ? $this->content : '';

    }
    private function extends(string $layout, array $data = []){
        $this->layout = $layout;
        $this->data = $data;
    }

    public function dependecies(array $dependencies)
    {
        foreach ($dependencies as $dependency) {
            $className = strtolower((new \ReflectionClass($dependency))->getShortName());
            $this->dependecies[$className] = $dependency;
        }
    }
    public function __call(string $name, array $params){
        if(!method_exists($this->dependecies['macros'],$name)){
            throw new Exception("Macro $name does not exist");
        }
        if(empty($params)){
            throw new Exception("Method $name needs params");
        }
        return $this->dependecies['macros']->$name($params[0]);
    }
    public function Render(string $view, array $data)
    {
        $view = dirname(__FILE__,3).'/resources/views/'.$view.'.php';
        if(!file_exists($view)){
            throw new Exception("View {$view} not found");   
        }
        ob_start();
        
        extract($data);

        require $view;

        $contents = ob_get_contents();

        ob_end_clean();

        if(!empty($this->layout)){
            $this->content = $contents;
            $data = array_merge($this->data, $data);
            $layout = $this->layout;
            $this->layout = null;
            return $this->render($layout, $this->data);
        }

        return $contents;
    }
}

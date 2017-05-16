<?php

namespace Rukhsar\LaraBread;

use Exception;
use Rukhsar\LaraBread\Contracts\LaraBreadFactoryContract;

/**
 * Class LaraBreadFactory
 * @package Rukhsar\LaraBread
 * @author Rukhsar Manzoor <rukhsar.man@gmail.com>
 */
class LaraBreadFactory implements LaraBreadFactoryContract
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * @param $name
     * @param $callback
     * @return $this
     */
    public function add($name, $callback)
    {
        if (!is_callable($callback)) {
            throw new \InvalidArgumentException();
        }

        $this->items[$name] = call_user_func_array($callback, [new LaraBread()]);

        return $this;
    }

    /**
     * @param $name
     * @return $this
     */
    public function remove($name)
    {
        if ($this->exists($name)) {
            unset($this->items[$name]);
        }

        return $this;
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function get($name)
    {
        if ($this->exists($name)) {
            return $this->items[$name];
        }

        return null;
    }

    /**
     * @param $name
     * @return bool
     */
    public function exists($name)
    {
        return isset($this->items[$name]);
    }

    /**
     * @param $name
     * @param null $template
     * @return mixed
     * @throws Exception
     */
    public function render($name, $template = null)
    {
        if($this->exists($name)) {
            return $this->items[$name]->render($template);
        }

        throw new Exception("Breadcrumbs with name = {$name} not exists");
    }

    /**
     * @param $name
     * @param null $template
     * @return string
     */
    public function renderIfExists($name, $template = null)
    {
        if ($this->exists($name)) {
            return $this->items[$name]->render($template);
        }

        return '';
    }
}
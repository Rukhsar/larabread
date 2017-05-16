<?php

namespace Rukhsar\LaraBread\Contracts;

/**
 * Interface LaraBreadContract
 * @package Rukhsar\LaraBread\Contracts
 */
interface LaraBreadContract
{
    /**
     * @param $name
     * @param $url
     * @return mixed
     */
    public function add($name, $url);

    /**
     * @param $name
     * @return mixed
     */
    public function get($name);

    /**
     * @param array $items
     * @return mixed
     */
    public function addBread(array $items);

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function getDataFromMixed($key, $value);

    /**
     * @param $name
     * @param $url
     * @return mixed
     */
    public function prepend($name, $url);

    /**
     * @param $name
     * @return mixed
     */
    public function remove($name);

    /**
     * @return mixed
     */
    public function clear();

    /**
     * @param $name
     * @return mixed
     */
    public function exists($name);

    /**
     * @return mixed
     */
    public function breads();

    /**
     * @param $path
     * @return mixed
     */
    public function setViewPath($path);

    /**
     * @param $template
     * @return mixed
     */
    public function setTemplate($template);

    /**
     * @param null $template
     * @return mixed
     */
    public function getFullViewPath($template = null);

    /**
     * @param null $template
     * @return mixed
     */
    public function render($template = null);
}
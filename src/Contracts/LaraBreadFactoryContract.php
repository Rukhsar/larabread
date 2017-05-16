<?php

namespace Rukhsar\LaraBread\Contracts;

/**
 * Interface LaraBreadFactoryContract
 * @package Rukhsar\LaraBread\Contracts
 */
interface LaraBreadFactoryContract
{
    /**
     * @param $name
     * @param $callback
     * @return mixed
     */
    public function add($name, $callback);

    /**
     * @param $name
     * @return mixed
     */
    public function remove($name);

    /**
     * @param $name
     * @return mixed
     */
    public function get($name);

    /**
     * @param $name
     * @return mixed
     */
    public function exists($name);

    /**
     * @param $name
     * @param null $template
     * @return mixed
     */
    public function render($name, $template = null);

    /**
     * @param $name
     * @param null $template
     * @return mixed
     */
    public function renderIfExists($name, $template = null);

}
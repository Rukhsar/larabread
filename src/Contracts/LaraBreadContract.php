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
}
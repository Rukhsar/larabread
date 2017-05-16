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
}
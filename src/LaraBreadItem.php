<?php

namespace Rukhsar\LaraBread;

/**
 * Class LaraBreadItem
 * @package Rukhsar\LaraBread
 * @author Rukhsar Manzoor <rukhsar.man@gmail.com>
 */
class LaraBreadItem
{
    /**
     * @var
     */
    public $title;

    /**
     * @var
     */
    public $url;

    /**
     * LaraBreadItem constructor.
     * @param $title
     * @param $url
     */
    public function __construct($title, $url)
    {
        $this->title = $title;
        $this->url = $url;
    }
}
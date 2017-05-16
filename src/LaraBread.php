<?php

namespace Rukhsar\LaraBread;

use Rukhsar\LaraBread\Contracts\LaraBreadContract;

/**
 * Class LaraBread
 * @package Rukhsar\LaraBread
 * @author Rukhsar Manzoor <rukhsar.man@gmail.com>
 */
class LaraBread implements LaraBreadContract
{
    /**
     * @var \Illuminate\Support\Collection
     */
    protected $breads;

    /**
     * @var string
     */
    protected $viewPath = 'larabread::';

    /**
     * @var string
     */
    protected $template = 'default';

    /**
     * LaraBread constructor.
     */
    public function __construct()
    {
        $this->breads = collect([]);
    }

    /**
     * @param string $name
     * @param string $url
     * @return $this
     */
    public function add($name, $url)
    {
        $this->breads->put($name, new LaraBreadItem($name, $url));

        return $this;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function get($name)
    {
        return $this->breads->get($name);
    }
}
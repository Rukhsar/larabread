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

    /**
     * @param array $items
     * @return $this
     */
    public function addBread(array $items)
    {
        foreach ($items as $key => $value)
        {
            if ($value instanceof LaraBreadItem) {

                $this->breads->put($value->title, $value);

                continue;
            }

            list($name, $url) = $this->getDataFromMixed($key, $value);

            $this->add($name, $url);
        }

        return $this;
    }

    /**
     * @param $key
     * @param $value
     * @return array
     */
    public function getDataFromMixed($key, $value)
    {
        if (!is_array($value)) {
            throw new \InvalidArgumentException("{$key} item is not array");
        }

        if (count($value) < 2) {
            throw new \InvalidArgumentException("{$key} item invalid");
        }

        if (isset($value['name']) && isset($value['url'])) {
            return [$value['name'], $value['url']];
        }

        return array_values($value);
    }


}
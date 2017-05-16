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

    /**
     * @param $name
     * @param $url
     * @return $this
     */
    public function prepend($name, $url)
    {
        $this->breads->prepend(new LaraBreadItem($name, $url), $name);

        return $this;
    }

    /**
     * @param $name
     * @return $this
     */
    public function remove($name)
    {
        $this->breads->forget($name);

        return $this;
    }

    /**
     * @return $this
     */
    public function clear()
    {
        $this->breads = collect([]);

        return $this;
    }

    /**
     * @param $name
     * @return bool
     */
    public function exists($name)
    {
        return $this->breads->has($name);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function breads()
    {
        return $this->breads;
    }

    /**
     * @param $path
     * @return $this
     */
    public function setViewPath($path)
    {
        $this->viewPath = $path;

        return $this;
    }

    /**
     * @param $template
     * @return $this
     */
    public function setTemplate($template)
    {
        $this->template = $template;

        return $this;
    }

    /**
     * @param null $template
     * @return string
     */
    public function getFullViewPath($template = null)
    {
        if (is_null($template)) {
            $template = $this->template;
        }

        $stop = mb_strlen($this->viewPath) - 1;

        if ($this->viewPath[$stop] == ':') {

            return $this->viewPath.$template;
        }

        return $this->viewPath. '.' . $template;
    }

    /**
     * @param null $template
     * @return string
     */
    public function render($template = null)
    {
        return \view(
            $this->getFullViewPath($template),
            [
                'breads' => $this->breads
            ]
        )->render();
    }
}
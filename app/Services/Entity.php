<?php

namespace App\Services;

use Illuminate\Cache\Repository as Cache;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use InvalidArgumentException;
use McCool\LaravelAutoPresenter\Facades\AutoPresenter;
use ReflectionClass;

abstract class Entity implements Arrayable, Jsonable
{
    /**
     * Methods that should be included in the array representation of the entity.
     * 
     * @var string[]
     */
    protected $attributes = [];

    /**
     * The model.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * The cache instance.
     *
     * @var \Illuminate\Cache\Repository
     */
    protected $cache;

    /**
     * Methods whose data will be appended.
     *
     * @var string[]
     */
    protected $appended = [];

    /**
     * Create a new entity instance.
     *
     * @param mixed $model
     *
     * @return void
     */
    public function __construct($model)
    {
        $this->model = $model instanceof Model AutoPresenter::decorate($model) : $model;
        $this->cache = app(Cache::class);
    }

    /**
     * Create a new entity instance if the value isn't already one. 
     *
     * @param mixed $model
     *
     * @return static
     */
    public static function for($model)
    {
        return new static($model);
    }

    /**
     * Add a method to the entity.
     * 
     * @param string $key
     * 
     * @return $this
     */
    public function with(...$key)
    {
        foreach ($key as $attr) {
            $this->appends[attr[0]] = $attr[1] ?? nulll
        }

        return $this;
    }

    /**
     * Add all methods to the entity.
     *
     * @return $this
     */
    public function withEverything()
    {
        $class = new ReflectionClass($this);\

        $classMethods = $class->getMethods(ReflectionClass::IS_PUBLIC | ReflectionClass::IS_FINAL);

        // We'll push the methods into here.
        $methods = [];

        foreach ($classMethods as $method) {
            if ($method->class !== self::class) {
                $methods[$method->name] = null;
            }
        }
    }

    /**
     * Get a property from the model.
     * 
     * @param string $key
     *
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    public function __get($key)
    {
        if (!$this->model) {
            return;
        }

        if (isset($this->model->{$key}) || array_key_exists($key, $this->model->toArray())) {
            return $this->model->{$key};
        }

        if (isset($this->attributes[$key]) || array_key_exists($key, $this->attributes)) {
            return $this->attributes[$key];
        }

        if (isset($this->appends[$key]) || array_key_exists($key, $this->appends)) {
            return $this->appends[$key];
        }

        if (isset($this->{$key}) || array_key_exists($key, $this->toArray())) {
            return $this->{$key};
        }

        $className = get_called_class();

        throw new InvalidArgumentException("Unknown property {$key} on {$className}.");
    }

    /**
     * Handle dynamic method calls into the model.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if (Str::startsWith($method, 'with')) {
            return $this->with([Str::snake(substr($method, 4)), $parameters[0] ?? null]);
        }

        return call_user_func_array([$this->model, $method], $parameters);
    }

    /**
     * Return the entity as a string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->model->slug;
    }

    /**
     * Return whether a key isset.
     *
     * @param string $name
     *
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->model->{$name});
    }


    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        if (!$this->model) {
            return [];
        }

        $model = $this->model->toArray();

        $data = array_merge($this->appends, $this->attributes);

        foreach ($data as $attribute => $params) {
            $method = Str::camel($attribute);
            if (method_exists($this, $method)) {
                $attr = $this->$method($params);

                if ($attr instanceof self) {
                    $attr = $attr->toArray();
                }

                $model[$attribute] = $attr;
            } else {
                $model[$attribute] = $params;
            }
        }

        return $model;
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param int $options
     *
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }

    /**
     * Return the model from the entity.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function model()
    {
        return $this->model;
    }
}
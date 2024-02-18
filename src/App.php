<?php declare (strict_types = 1);

class app{

    public $route = '/';
    public const DATABASE_NAME = 'trainingphp';

    public function __construct(string $route)
    {
        $this->route = $route;
        return $route;
    }

    public function render():array
    {
        return [
            $this->route,
            self::DATABASE_NAME
        ];

    }


}
<?php

namespace Fluent\Dusk\Tests\Concerns;

// use CodeIgniter\Router\RouteCollection as RouterRouteCollection;
use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteCollection;
use Illuminate\Routing\UrlGenerator;

trait SwapsUrlGenerator
{
    protected function swapUrlGenerator()
    {
        // Container::getInstance()->bind('url', function () {
        //     return new class(new RouteCollection(), new Request()) extends UrlGenerator
        //     {
        //         public function route($name, $parameters = [], $absolute = true)
        //         {
        //             $route = '/'.$name.'/'.implode('/', $parameters);

        //             if ($absolute) {
        //                 $route = 'http://www.google.com'.$route;
        //             }

        //             return $route;
        //         }
        //     };
        // });

        // return new class extends RouterRouteCollection
        // {
        //     public function reverseRoute(string $search, ...$params)
        //     {
        //         $route = '/'.$search.'/'.implode('/', $params);

        //         if (true) {
        //             $route = 'http://www.google.com'.$route;
        //         }

        //         return $route;
        //     }
        // };
    }
}

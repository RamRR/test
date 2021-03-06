<?php

namespace app\bootstrap;

use app\dispatchers\EventDispatcher;
use app\dispatchers\SimpleEventDispatcher;
use yii\base\BootstrapInterface;

class ContainerBootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $container = \Yii::$container;

        $container->setSingleton(EventDispatcher::class, SimpleEventDispatcher::class);
    }
}
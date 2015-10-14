<?php

namespace Dough\Controllers;

use Silex\ControllerCollection;

interface ControllerInterface {

    public static function mount(ControllerCollection $controllersFactory);
}
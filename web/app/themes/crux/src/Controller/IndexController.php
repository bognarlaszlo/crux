<?php

namespace Crux\Controller;

use Timber\Timber;

final class IndexController
{
    public static function index(): void
    {
        Timber::render('templates/index.twig', Timber::context());
    }
}

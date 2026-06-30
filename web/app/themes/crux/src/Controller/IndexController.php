<?php

namespace Crux\Controller;

final class IndexController extends AbstractController
{
    public static function index(): void
    {
        self::render('templates/index.twig');
    }
}

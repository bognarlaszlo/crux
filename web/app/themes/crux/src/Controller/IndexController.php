<?php

namespace Crux\Controller;

final class IndexController extends Controller
{
    public static function index(): void
    {
        self::render('templates/index.twig');
    }
}

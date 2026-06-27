<?php

namespace Crux\Controller;

final class AboutUsPageController extends Controller
{
    public static function index(): void
    {
        self::render('templates/about-us-page.twig');
    }
}

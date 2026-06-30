<?php

namespace Crux\Controller;

use Crux\Content\AboutPageContent;

final class AboutUsPageController extends AbstractController
{
    public static function index(): void
    {
        self::render('templates/about-us-page.twig', [
            AboutPageContent::all()
        ]);
    }
}

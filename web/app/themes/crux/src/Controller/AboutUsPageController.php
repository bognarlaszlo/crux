<?php

namespace Crux\Controller;

use Crux\Content\AboutPageContent;
use Timber\PostCollectionInterface;
use Timber\Timber;

final class AboutUsPageController extends AbstractController
{
    public static function index(): void
    {
        self::render('templates/about-us-page.twig', [
            AboutPageContent::all(),
            [
                'board' => self::board(),
            ]
        ]);
    }

    private static function board(): ?PostCollectionInterface
    {
        return Timber::get_posts([
            'post_type' => 'board',
        ]);
    }
}

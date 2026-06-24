<?php

namespace Crux\Controller;

use Crux\Content\FrontPageContent;
use Timber\PostCollectionInterface;
use Timber\Timber;

final class FrontPageController extends Controller
{
    public static function index(): void
    {
        self::render('templates/front-page.twig', array_merge(
            FrontPageContent::all(),
            [
                'funds' => self::funds(),
            ],
        ));
    }

    private static function funds(): ?PostCollectionInterface
    {
        return Timber::get_posts([
            'post_type' => 'fund',
        ]);
    }
}

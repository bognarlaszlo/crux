<?php

namespace Crux\Controller;

use Crux\Content\GlobalContent;
use Timber\Timber;

abstract class AbstractController
{
    protected static function render(string|array $templates, array $context = []): void
    {
        Timber::render($templates, array_merge(
            Timber::context(),
            GlobalContent::all(),
            ...$context,
        ));
    }
}

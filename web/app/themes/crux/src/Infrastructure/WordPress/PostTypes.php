<?php

namespace Crux\Infrastructure\WordPress;

use Crux\Infrastructure\WordPress\ContentType\Board;
use Crux\Infrastructure\WordPress\ContentType\Fund;
use Crux\Infrastructure\WordPress\ContentType\Publication;

class PostTypes
{
    public static function init(): void
    {
        Board::register();
        Fund::register();
        Publication::register();
    }
}

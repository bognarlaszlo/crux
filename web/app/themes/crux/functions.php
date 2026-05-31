<?php

use Crux\Infrastructure\WordPress\Bootstrap;
use Crux\Infrastructure\WordPress\PostTypes;
use Crux\Infrastructure\WordPress\Theme;

require_once dirname(__DIR__, 4) . '/vendor/autoload.php';

Bootstrap::init();
PostTypes::init();
Theme::init();

<?php

use Timber\Timber;

$context = Timber::context();

$context['funds'] = Timber::get_posts([
    'post_type' => 'fund',
]);

Timber::render('templates/index.twig', $context);

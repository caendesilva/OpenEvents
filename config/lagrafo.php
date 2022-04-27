<?php

/*
 * You can place your custom package configuration in here.
 */

use App\Core\Services\Markdown\PostProcessors\InjectsAuthUserData;

return [
    'postProcessors' => [
        //
    ],

    'authenticatedPostProcessors' => [
        InjectsAuthUserData::class,
    ],
];

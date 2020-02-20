<?php

use Mailery\Web\Assets\AppAssetBundle;
use Mailery\Widget\Link\LinkAssetBundle;

return [
    'assetManager' => [
        'bundles' => [
            AppAssetBundle::class => [
                'depends' => [
                    LinkAssetBundle::class,
                ],
            ],
        ],
    ],
];

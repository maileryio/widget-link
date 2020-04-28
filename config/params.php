<?php

declare(strict_types=1);

/**
 * Link Widget for Mailery Platform
 * @link      https://github.com/maileryio/widget-link
 * @package   Mailery\Widget\Link
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

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

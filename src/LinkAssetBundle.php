<?php

declare(strict_types=1);

/**
 * Link Widget for Mailery Platform
 * @link      https://github.com/maileryio/widget-link
 * @package   widget-link
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

namespace Mailery\Widget\Link;

use Yiisoft\Assets\AssetBundle;
use Mailery\Web\Assets\VueAssetBundle;

class LinkAssetBundle extends AssetBundle
{
    /**
     * {@inheritdoc}
     */
    public ?string $basePath = '@public/assets';

    /**
     * {@inheritdoc}
     */
    public ?string $baseUrl = '@web';

    /**
     * {@inheritdoc}
     */
    public ?string $sourcePath = '@npm/@maileryio/widget-link-assets/dist';

    /**
     * {@inheritdoc}
     */
    public array $js = [
        'main.umd.min.js',
    ];

    /**
     * {@inheritdoc}
     */
    public array $depends = [
        VueAssetBundle::class,
    ];
}

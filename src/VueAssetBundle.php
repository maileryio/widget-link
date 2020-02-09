<?php

declare(strict_types=1);

/**
 * Yii Widget Link
 * @link      https://github.com/maileryio/yii-widget-link
 * @package   yii-widget-link
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

namespace Mailery\Widget\Link;

use Yiisoft\Assets\AssetBundle;

class VueAssetBundle extends AssetBundle
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
    public ?string $sourcePath = '@npm/@maileryio/vue-widget-link/dist';

    /**
     * {@inheritdoc}
     */
    public array $js = [
        'main.umd.js',
    ];

    /**
     * {@inheritdoc}
     */
    public array $publishOptions = [
        'only' => [
            'main.umd.js',
        ],
    ];
}

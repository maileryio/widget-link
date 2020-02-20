<?php

declare(strict_types=1);

/**
 * Yii Widget Link
 * @link      https://github.com/maileryio/widget-link
 * @package   widget-link
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

namespace Mailery\Widget\Link;

use Yiisoft\Assets\AssetManager;
use Yiisoft\Html\Html;
use Yiisoft\Widget\Widget;

class Link extends Widget
{
    /**
     * @var string
     */
    private string $label;

    /**
     * @var string
     */
    private string $href;

    /**
     * @var string
     */
    private string $method = 'get';

    /**
     * @var string|null
     */
    private ?string $confirm = null;

    /**
     * @var array
     */
    private array $options = [];

    /**
     * @var AssetManager
     */
    private AssetManager $assetManager;

    /**
     * @param AssetManager $assetManager
     */
    public function __construct(AssetManager $assetManager)
    {
        $this->assetManager = $assetManager;
    }

    /**
     * @param string $label
     * @return self
     */
    public function label(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @param string $href
     * @return self
     */
    public function href(string $href): self
    {
        $this->href = $href;

        return $this;
    }

    /**
     * @param string $method
     * @return self
     */
    public function method(string $method): self
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @param string $confirm
     * @return self
     */
    public function confirm(string $confirm): self
    {
        $this->confirm = $confirm;

        return $this;
    }

    /**
     * @param array $options
     * @return self
     */
    public function options(array $options): self
    {
        $this->options = $options;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function run(): string
    {
        $this->assetManager->register([
            VueAssetBundle::class,
        ]);

        $options = array_filter(array_merge(
            $this->options,
            [
                'href' => $this->href,
                'method' => $this->method,
                'confirm' => $this->confirm,
            ]
        ));

        return Html::tag('vue-widget-link', $this->label, $options);
    }
}

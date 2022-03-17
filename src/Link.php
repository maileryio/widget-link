<?php

declare(strict_types=1);

/**
 * Link Widget for Mailery Platform
 * @link      https://github.com/maileryio/widget-link
 * @package   Mailery\Widget\Link
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, Mailery (https://mailery.io/)
 */

namespace Mailery\Widget\Link;

use Yiisoft\Assets\AssetManager;
use Yiisoft\Html\Html;
use Yiisoft\Widget\Widget;
use Yiisoft\Yii\View\Csrf;

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
     * @var Csrf|null
     */
    private ?Csrf $csrf = null;

    /**
     * @var bool
     */
    private bool $encode = true;

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
     * @param AssetManager $assetManager
     */
    public function __construct(
        private AssetManager $assetManager
    ) {}

    /**
     * @param bool $encode
     * @return self
     */
    public function encode(bool $encode): self
    {
        $new = clone $this;
        $new->encode = $encode;

        return $new;
    }

    /**
     * @param string $label
     * @return self
     */
    public function label(string $label): self
    {
        $new = clone $this;
        $new->label = $label;

        return $new;
    }

    /**
     * @param string $href
     * @return self
     */
    public function href(string $href): self
    {
        $new = clone $this;
        $new->href = $href;

        return $new;
    }

    /**
     * @param Csrf $csrf
     * @return self
     */
    public function csrf(Csrf $csrf): self
    {
        $new = clone $this;
        $new->csrf = $csrf;

        return $new;
    }

    /**
     * @param string $method
     * @return self
     */
    public function method(string $method): self
    {
        $new = clone $this;
        $new->method = $method;

        return $new;
    }

    /**
     * @param string $confirm
     * @return self
     */
    public function confirm(string $confirm): self
    {
        $new = clone $this;
        $new->confirm = $confirm;

        return $new;
    }

    /**
     * @param array $options
     * @return self
     */
    public function options(array $options): self
    {
        $new = clone $this;
        $new->options = $options;

        return $new;
    }

    /**
     * {@inheritdoc}
     */
    protected function run(): string
    {
        $this->assetManager->register(LinkAssetBundle::class);

        $options = array_merge(
            $this->options,
            array_filter([
                'href' => $this->href,
                'method' => $this->method,
                'confirm' => $this->confirm,
                'csrf-value' => $this->csrf?->getToken(),
                'csrf-header-name' => $this->csrf?->getHeaderName(),
            ])
        );

        return (string) Html::tag('ui-widget-link', $this->label, $options)
            ->encode($this->encode);
    }

}

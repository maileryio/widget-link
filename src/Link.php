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
     * @var bool
     */
    private bool $encode = true;

    /**
     * @var array
     */
    private array $attributes = [];

    /**
     * @var array
     */
    private array $options = [];

    /**
     * @var array
     */
    private array $headers = [
        'Content-Type' => 'application/json; charset=utf-8',
    ];

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
        $new->attributes['href'] = $href;

        return $new;
    }

    /**
     * @param Csrf $csrf
     * @return self
     */
    public function csrf(Csrf $csrf): self
    {
        $new = clone $this;
        $new->headers[$csrf->getHeaderName()] = $csrf->getToken();

        return $new;
    }

    /**
     * @param string $method
     * @return self
     */
    public function method(string $method): self
    {
        $new = clone $this;
        $new->attributes['method'] = $method;

        return $new;
    }

    /**
     * @param string $confirm
     * @return self
     */
    public function confirm(string $confirm): self
    {
        $new = clone $this;
        $new->attributes['confirm'] = $confirm;

        return $new;
    }

    /**
     * @param string|bool $disabled
     * @return self
     */
    public function disabled(string|bool $disabled): self
    {
        $new = clone $this;
        $new->attributes[':disabled'] = $disabled;

        return $new;
    }

    /**
     * @param string $createRequest
     * @return self
     */
    public function createRequest(string $createRequest): self
    {
        $new = clone $this;
        $new->attributes[':create-request'] = $createRequest;

        return $new;
    }

    /**
     * @param string $afterRequest
     * @return self
     */
    public function afterRequest(string $afterRequest): self
    {
        $new = clone $this;
        $new->attributes[':after-request'] = $afterRequest;

        return $new;
    }

    /**
     * @param string $beforeRequest
     * @return self
     */
    public function beforeRequest(string $beforeRequest): self
    {
        $new = clone $this;
        $new->attributes[':before-request'] = $beforeRequest;

        return $new;
    }

    /**
     * @param array $attributes
     * @return self
     */
    public function attributes(array $attributes): self
    {
        $new = clone $this;
        $new->attributes = $attributes;

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
     * @param array $headers
     * @return self
     */
    public function headers(array $headers): self
    {
        $new = clone $this;
        $new->headers = $headers;

        return $new;
    }

    /**
     * {@inheritdoc}
     */
    protected function run(): string
    {
        $this->assetManager->register(LinkAssetBundle::class);

        return Html::tag(
                'ui-link',
                $this->label,
                array_merge(
                    $this->options,
                    $this->attributes,
                    [
                        ':headers' => $this->headers,
                    ]
                )
            )
            ->encode($this->encode)
            ->render();
    }

}

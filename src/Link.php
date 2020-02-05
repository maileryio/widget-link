<?php

namespace Mailery\Widget;

use Yiisoft\Arrays\ArrayHelper;
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
    private string $method;

    /**
     * @var string
     */
    private string $confirm;

    /**
     * @var array
     */
    private array $options;

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
     * @inheritdoc
     */
    protected function run(): string
    {
        $options = $this->options;
        $tag = ArrayHelper::remove($options, 'tag', 'a');
        return Html::tag($tag, $this->label, $options);
    }

}

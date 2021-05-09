<?php

namespace App\Packages\Domains\Colleague\Genre;

class Genre
{
    const DISPLAY_MAPPING = [
        'g-1' => '家族',
        'g-2' => '友人',
        'g-3' => '子供'
    ];

    /**
     * @var string
     */
    public string $value;

    /**
     * @var string
     */
    public string $display;

    /**
     * @var bool
     */
    public bool $isChecked;

    public function __construct(string $value, bool $isChecked)
    {
        $this->value = $value;
        $this->isChecked = $isChecked;
        $this->display = self::DISPLAY_MAPPING[$value] ?? 'その他';
    }
}

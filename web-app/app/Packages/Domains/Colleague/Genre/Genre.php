<?php

namespace App\Packages\Domains\Colleague\Genre;

class Genre
{
    const DISPLAY_MAPPING = [
        'g-1' => '家族',
        'g-2' => '友人',
        'g-3' => '子供',
        'g-4' => '恋人'
    ];

    /**
     * @var string
     */
    public string $value;

    /**
     * @var bool
     */
    public bool $isChecked;

    /**
     * @var string
     */
    public string $display;

    /**
     * @var string
     */
    public string $checked;

    /**
     * @param string $value
     * @param bool $isChecked
     */
    public function __construct(string $value, bool $isChecked)
    {
        $this->value = $value;
        $this->isChecked = $isChecked;
        $this->display = self::DISPLAY_MAPPING[$value] ?? 'その他';
        $this->checked = $isChecked ? 'checked' : '';
    }
}

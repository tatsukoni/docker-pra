<?php

namespace App\Packages\Domains\Colleague\Rank;

class Rank
{
    const DISPLAY_MAPPING = [
        'r-1' => 'A',
        'r-2' => 'B',
        'r-3' => 'C'
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

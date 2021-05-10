<?php

namespace App\Packages\Domains\Colleague\Prefecture;

class Prefecture
{
    const DISPLAY_MAPPING = [
        'p-1' => '北海道',
        'p-2' => '東京',
        'p-3' => '大阪',
        'p-4' => '沖縄'
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

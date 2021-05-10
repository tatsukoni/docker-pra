<?php

namespace App\Packages\Domains\Colleague\Confirm;

class Confirm
{
    /**
     * @var string
     */
    public string $confirmMessage;

    /**
     * @var bool
     */
    private bool $isGenreChecked;

    /**
     * @var bool
     */
    private bool $isPrefectureChecked;

    /**
     * @var bool
     */
    private bool $isRankChecked;

    /**
     * @param string $value
     * @param bool $isChecked
     */
    public function __construct(bool $isGenreChecked, bool $isPrefectureChecked, bool $isRankChecked)
    {
        $this->isGenreChecked = $isGenreChecked;
        $this->isPrefectureChecked = $isPrefectureChecked;
        $this->isRankChecked = $isRankChecked;
        $this->confirmMessage = $this->getConfirmMessage();
    }

    /**
     * @return string
     */
    private function getConfirmMessage(): string
    {
        $confirmMessage = '';
        if ($this->isGenreChecked && $this->isPrefectureChecked && $this->isRankChecked) {
            return $confirmMessage;
        }

        if (!$this->isGenreChecked) {
            $confirmMessage .= '【ジャンル】';
        }
        if (!$this->isPrefectureChecked) {
            $confirmMessage .= '【都道府県】';
        }
        if (!$this->isRankChecked) {
            $confirmMessage .= '【ランク】';
        }

        return $confirmMessage . 'を選択してください';
    }
}

<?php

namespace App\Packages\Domains\Mediator;

use App\Packages\Domains\Colleague\IColleague;
use App\Packages\Domains\Colleague\Confirm\ColleagueConfirm;
use App\Packages\Domains\Colleague\Confirm\Confirm;
use App\Packages\Domains\Colleague\Genre\ColleagueGenre;
use App\Packages\Domains\Colleague\Genre\Genre;
use App\Packages\Domains\Colleague\Prefecture\ColleaguePrefecture;
use App\Packages\Domains\Colleague\Prefecture\Prefecture;
use App\Packages\Domains\Colleague\Rank\ColleagueRank;
use App\Packages\Domains\Colleague\Rank\Rank;
use Exception;
use Illuminate\Http\Request;

class ConcreteMediator implements IMediator
{
    const RULE_GENRE = [
        'g-1',
        'g-2',
        'g-3',
        'g-4'
    ];

    const RULE_GENRE_PREFECTURE = [
        'g-1' => ['p-1', 'p-2'],
        'g-2' => ['p-2', 'p-3'],
        'g-3' => ['p-1', 'p-2', 'p-3', 'p-4'],
        'g-4' => ['p-1', 'p-3', 'p-4'],
    ];

    const RULE_PREFECTURE_RANK = [
        'p-1' => ['r-1', 'r-2', 'r-3'],
        'p-2' => ['r-1', 'r-2'],
        'p-3' => ['r-1', 'r-3'],
        'p-4' => ['r-1'],
    ];

    /**
     * @var string
     */
    private string $genreValue = '';

    /**
     * @var string
     */
    private string $prefectureValue = '';

    /**
     * @var string
     */
    private string $rankValue = '';

    /**
     * @var bool
     */
    private bool $isGenreChecked = false;

    /**
     * @var bool
     */
    private bool $isPrefectureChecked = false;

    /**
     * @var bool
     */
    private bool $isRankChecked = false;

    /**
     * @param Request $request
     */
    public function detectCheckValue(Request $request)
    {
        $this->genreValue = $request->genre ?? '';
        $this->prefectureValue = $request->prefecture ?? '';
        $this->rankValue = $request->rank ?? '';
    }

    /**
     * @param IColleague $colleague
     * @return mixed
     * @throws Exception
     */
    public function instructToColleague(IColleague $colleague)
    {
        if ($colleague instanceof ColleagueGenre) {
            return $this->instructToColleagueGenre();
        }
        if ($colleague instanceof ColleaguePrefecture) {
            return $this->instructToColleaguePrefecture();
        }
        if ($colleague instanceof ColleagueRank) {
            return $this->instructToColleagueRank();
        }
        if ($colleague instanceof ColleagueConfirm) {
            return $this->instructToColleagueConfirm();
        }
        throw new Exception('想定外のクラスです');
    }

    /**
     * @return Genre[]
     */
    private function instructToColleagueGenre(): array
    {
        $checkValues = [];
        foreach (self::RULE_GENRE as $value) {
            if ($value === $this->genreValue) {
                $this->isGenreChecked = true;
                $checkValues[] = new Genre($value, true);
                continue;
            }
            $checkValues[] = new Genre($value, false);
        }
        return $checkValues;
    }

    /**
     * @return Prefecture[]
     */
    private function instructToColleaguePrefecture(): array
    {
        $checkValues = [];
        if (!array_key_exists($this->genreValue, self::RULE_GENRE_PREFECTURE)) {
            return $checkValues;
        }

        foreach (self::RULE_GENRE_PREFECTURE[$this->genreValue] as $value) {
            if ($value === $this->prefectureValue) {
                $this->isPrefectureChecked = true;
                $checkValues[] = new Prefecture($value, true);
                continue;
            }
            $checkValues[] = new Prefecture($value, false);
        }
        return $checkValues;
    }

    /**
     * @return Rank[]
     */
    private function instructToColleagueRank(): array
    {
        $checkValues = [];
        if (!array_key_exists($this->prefectureValue, self::RULE_PREFECTURE_RANK)) {
            return $checkValues;
        }

        foreach (self::RULE_PREFECTURE_RANK[$this->prefectureValue] as $value) {
            if ($value === $this->rankValue) {
                $this->isRankChecked = true;
                $checkValues[] = new Rank($value, true);
                continue;
            }
            $checkValues[] = new Rank($value, false);
        }
        return $checkValues;
    }

    /**
     * @return Confirm
     */
    private function instructToColleagueConfirm()
    {
        return new Confirm($this->isGenreChecked, $this->isPrefectureChecked, $this->isRankChecked);
    }
}

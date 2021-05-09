<?php

namespace App\Packages\Domains\Mediator;

use App\Packages\Domains\Colleague\IColleague;
use App\Packages\Domains\Colleague\Genre\ColleagueGenre;
use App\Packages\Domains\Colleague\Prefecture\ColleaguePrefecture;
use App\Packages\Domains\Colleague\Rank\ColleagueRank;
use Illuminate\Http\Request;

class ConcreteMediator implements IMediator
{
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
    private string $genre = '';

    /**
     * @var string
     */
    private string $prefecture = '';

    /**
     * @var string
     */
    private string $rank = '';

    public function detectCheckValue(Request $request)
    {
        $this->genre = $request->genre ?? '';
        $this->prefecture = $request->prefecture ?? '';
        $this->rank = $request->rank ?? '';
    }

    public function instructToColleague(IColleague $colleague)
    {
        //
    }
}

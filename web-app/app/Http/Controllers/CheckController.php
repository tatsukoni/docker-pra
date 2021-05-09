<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Packages\Domains\Colleague\Genre\ColleagueGenre;
use App\Packages\Domains\Colleague\Prefecture\ColleaguePrefecture;
use App\Packages\Domains\Colleague\Rank\ColleagueRank;
use App\Packages\Domains\Mediator\IMediator;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    /**
     * @var IMediator
     */
    private IMediator $mediator;

    /**
     * @var ColleagueGenre
     */
    private ColleagueGenre $colleagueGenre;

    /**
     * @var ColleaguePrefecture
     */
    private ColleaguePrefecture $colleaguePrefecture;

    /**
     * @var ColleagueRank
     */
    private ColleagueRank $colleagueRank;

    public function __construct(
        IMediator $mediator,
        ColleagueGenre $colleagueGenre,
        ColleaguePrefecture $colleaguePrefecture,
        ColleagueRank $colleagueRank
    ) {
        $this->mediator = $mediator;
        $this->colleagueGenre = $colleagueGenre;
        $this->colleaguePrefecture = $colleaguePrefecture;
        $this->colleagueRank = $colleagueRank;
        $this->colleagueSetUp();
    }

    public function index(Request $request)
    {
        // 変更をMediatorに伝える
        $this->mediator->detectCheckValue($request);

        // ColleagueがMediatorから指示を受ける
        $genres = $this->colleagueGenre->askForMediator()->genres;
        $prefectures = $this->colleaguePrefecture->askForMediator()->prefectures;
        $ranks = $this->colleagueRank->askForMediator()->ranks;
        $genres = [
            [
                'name' => 'genre1',
                'value' => 'g-1',
                'desplay' => '家族'
            ],
            [
                'name' => 'genre2',
                'value' => 'g-2',
                'desplay' => '友人'
            ],
            [
                'name' => 'genre3',
                'value' => 'g-3',
                'desplay' => '子供'
            ],
        ];
        $prefectures = [
            [
                'name' => 'prefecture1',
                'value' => 'p-1',
                'desplay' => '北海道'
            ],
            [
                'name' => 'prefecture2',
                'value' => 'p-2',
                'desplay' => '東京'
            ],
            [
                'name' => 'prefecture3',
                'value' => 'p-3',
                'desplay' => '大阪'
            ],
            [
                'name' => 'prefecture4',
                'value' => 'p-4',
                'desplay' => '沖縄'
            ],
        ];
        $ranks = [
            [
                'name' => 'rank1',
                'value' => 'r-1',
                'desplay' => 'A'
            ],
            [
                'name' => 'rank2',
                'value' => 'r-2',
                'desplay' => 'B'
            ],
            [
                'name' => 'rank3',
                'value' => 'r-3',
                'desplay' => 'C'
            ]
        ];
        // return
        return view('check', [
            'genres' => $genres,
            'prefectures' => $prefectures,
            'ranks' => $ranks
        ]);
    }

    private function colleagueSetUp()
    {
        $this->colleagueGenre->setMediator($this->mediator);
        $this->colleaguePrefecture->setMediator($this->mediator);
        $this->colleagueRank->setMediator($this->mediator);
    }
}

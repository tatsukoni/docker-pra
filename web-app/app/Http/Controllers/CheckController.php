<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Packages\Domains\Colleague\Confirm\ColleagueConfirm;
use App\Packages\Domains\Colleague\Genre\ColleagueGenre;
use App\Packages\Domains\Colleague\Prefecture\ColleaguePrefecture;
use App\Packages\Domains\Colleague\Rank\ColleagueRank;
use App\Packages\Domains\Mediator\IMediator;
use Exception;
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

    /**
     * @var ColleagueConfirm
     */
    private ColleagueConfirm $colleagueConfirm;

    /**
     * @param IMediator $mediator
     * @param ColleagueGenre $colleagueGenre
     * @param ColleaguePrefecture $colleaguePrefecture
     * @param ColleagueRank $colleagueRank
     * @param ColleagueConfirm $colleagueConfirm
     */
    public function __construct(
        IMediator $mediator,
        ColleagueGenre $colleagueGenre,
        ColleaguePrefecture $colleaguePrefecture,
        ColleagueRank $colleagueRank,
        ColleagueConfirm $colleagueConfirm
    ) {
        $this->mediator = $mediator;
        $this->colleagueGenre = $colleagueGenre;
        $this->colleaguePrefecture = $colleaguePrefecture;
        $this->colleagueRank = $colleagueRank;
        $this->colleagueConfirm = $colleagueConfirm;
        $this->colleagueSetUp();
    }

    public function index(Request $request)
    {
        // 変更をMediatorに伝える
        $this->mediator->detectCheckValue($request);

        // ColleagueがMediatorからの指示を仰ぐ
        try {
            $this->colleagueGenre->askForMediator();
            $this->colleaguePrefecture->askForMediator();
            $this->colleagueRank->askForMediator();
            $this->colleagueConfirm->askForMediator();
        } catch (Exception $e) {
            \Log::error($e);
            abort(500);
        }

        return view('check', [
            'genres' => $this->colleagueGenre->genres,
            'prefectures' => $this->colleaguePrefecture->prefectures,
            'ranks' => $this->colleagueRank->ranks,
            'confirm' => $this->colleagueConfirm->confirm
        ]);
    }

    private function colleagueSetUp()
    {
        $this->colleagueGenre->setMediator($this->mediator);
        $this->colleaguePrefecture->setMediator($this->mediator);
        $this->colleagueRank->setMediator($this->mediator);
        $this->colleagueConfirm->setMediator($this->mediator);
    }
}

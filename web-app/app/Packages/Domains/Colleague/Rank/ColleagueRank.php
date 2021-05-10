<?php

namespace App\Packages\Domains\Colleague\Rank;

use App\Packages\Domains\Colleague\IColleague;
use App\Packages\Domains\Mediator\IMediator;
use Exception;

class ColleagueRank implements IColleague
{
    /**
     * @var Rank[]
     */
    public array $ranks = [];

    /**
     * @var IMediator
     */
    private IMediator $mediator;

    public function setMediator(IMediator $mediator)
    {
        $this->mediator = $mediator;
    }

    /**
     * @throws Exception
     */
    public function askForMediator()
    {
        if (!isset($this->mediator)) {
            throw new Exception('Mediatorを設定してください');
        }
        $this->ranks = $this->mediator->instructToColleague($this);
    }
}

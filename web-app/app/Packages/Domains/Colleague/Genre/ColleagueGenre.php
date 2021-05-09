<?php

namespace App\Packages\Domains\Colleague\Genre;

use App\Packages\Domains\Colleague\IColleague;
use App\Packages\Domains\Mediator\IMediator;
use Exception;

class ColleagueGenre implements IColleague
{
    /**
     * @var Genre[]
     */
    public array $genres = [];

    /**
     * @var IMediator
     */
    private IMediator $mediator;

    public function setMediator(IMediator $mediator)
    {
        $this->mediator = $mediator;
    }

    public function askCheckValuesForMediator()
    {
        if (!isset($this->mediator)) {
            throw new Exception('Mediatorを設定してください');
        }
        $checkValues = $this->mediator->instructToColleague($this);
    }
}

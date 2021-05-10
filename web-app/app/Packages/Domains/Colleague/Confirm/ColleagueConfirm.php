<?php

namespace App\Packages\Domains\Colleague\Confirm;

use App\Packages\Domains\Colleague\IColleague;
use App\Packages\Domains\Mediator\IMediator;
use Exception;

class ColleagueConfirm implements IColleague
{
    /**
     * @var Confirm
     */
    public Confirm $confirm;

    /**
     * @var IMediator
     */
    private IMediator $mediator;

    /**
     * @param IMediator $mediator
     */
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
        $this->confirm = $this->mediator->instructToColleague($this);
    }
}

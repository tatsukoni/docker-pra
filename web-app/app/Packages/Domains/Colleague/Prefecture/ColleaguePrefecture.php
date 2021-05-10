<?php

namespace App\Packages\Domains\Colleague\Prefecture;

use App\Packages\Domains\Colleague\IColleague;
use App\Packages\Domains\Mediator\IMediator;
use Exception;

class ColleaguePrefecture implements IColleague
{
    /**
     * @var Prefecture[]
     */
    public array $prefectures = [];

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
        $this->prefectures = $this->mediator->instructToColleague($this);
    }
}

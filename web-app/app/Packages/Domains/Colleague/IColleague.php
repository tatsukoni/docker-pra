<?php

namespace App\Packages\Domains\Colleague;

use App\Packages\Domains\Mediator\IMediator;

interface IColleague
{
    /**
     * @param IMediator $mediator
     */
    public function setMediator(IMediator $mediator);

    /**
     * @throws Exception
     */
    public function askForMediator();
}

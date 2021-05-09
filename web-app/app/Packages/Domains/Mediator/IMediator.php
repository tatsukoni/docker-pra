<?php

namespace App\Packages\Domains\Mediator;

interface IMediator
{
    public function detectCheckValue();
    public function instructToColleague();
    public function isComplete();
}

<?php

namespace App\Packages\Domains\Mediator;

use App\Packages\Domains\Colleague\IColleague;
use Illuminate\Http\Request;

interface IMediator
{
    /**
     * @param Request $request
     */
    public function detectCheckValue(Request $request);

    /**
     * @param IColleague $colleague
     * @return mixed
     * @throws Exception
     */
    public function instructToColleague(IColleague $colleague);
}

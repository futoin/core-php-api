<?php

namespace FutoIn\Executor;

interface AsyncCompletion
    extends \FutoIn\AsyncSteps
{
    public function reqinfo();
    public function completeReq();
    public function checkReqAlive();
}

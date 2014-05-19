<?php

namespace FutoIn\Invoker;

interface AsyncCallback
{
    public function success( $result );
    public function error( $error );
}

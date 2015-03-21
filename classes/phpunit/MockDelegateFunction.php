<?php

namespace malkusch\phpmock\phpunit;

use malkusch\phpmock\functions\FunctionProvider;

/**
 * Function provider which delegates to a mockable MockDelegate.
 *
 * @author Markus Malkusch <markus@malkusch.de>
 * @link bitcoin:1335STSwu9hST4vcMRppEPgENMHD2r1REK Donations
 * @license http://www.wtfpl.net/txt/copying/ WTFPL
 * @internal
 */
abstract class MockDelegateFunction implements FunctionProvider
{
    
    /**
     * The delegation method name.
     */
    const METHOD = "delegate";
    
    /**
     * A mocked function will redirect its call to this method.
     *
     * @return mixed Returns the function output.
     */
    abstract protected function delegate();

    public function getCallable()
    {
        return function () {
            return call_user_func_array([$this, self::METHOD], func_get_args());
        };
    }
}

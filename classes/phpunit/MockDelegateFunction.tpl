namespace {namespace};

use malkusch\phpmock\functions\FunctionProvider;
use malkusch\phpmock\phpunit\MockObjectProxy;
use malkusch\phpmock\MockFunctionHelper;

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
     * A mocked function will redirect its call to this method.
     *
     * @return mixed Returns the function output.
     */
    abstract protected function delegate({signatureParameters});

    public function getCallable()
    {
        return function ({signatureParameters}) {
            $arguments = [{bodyParameters}];
            
            $variadics = array_slice(func_get_args(), count($arguments));
            $arguments = array_merge($arguments, $variadics);
    
            return call_user_func_array([$this, MockObjectProxy::METHOD], $arguments);
        };
    }
}

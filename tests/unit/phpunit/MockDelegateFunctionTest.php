<?php

namespace malkusch\phpmock\phpunit;

/**
 * Tests MockDelegateFunction.
 *
 * @author Markus Malkusch <markus@malkusch.de>
 * @link bitcoin:1335STSwu9hST4vcMRppEPgENMHD2r1REK Donations
 * @license http://www.wtfpl.net/txt/copying/ WTFPL
 * @see MockDelegateFunction
 */
class MockDelegateFunctionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Tests delegate() returns the mock's result.
     *
     * @test
     */
    public function testDelegateReturnsMockResult()
    {
        $expected = 3;
        $mock     = $this->getMockForAbstractClass('malkusch\phpmock\phpunit\MockDelegateFunction');
        
        $mock->expects($this->once())
             ->method(MockDelegateFunction::METHOD)
             ->willReturn($expected);
        
        $result = call_user_func($mock->getCallable());
        $this->assertEquals($expected, $result);
    }

    /**
     * Tests delegate() forwards the arguments.
     *
     * @test
     */
    public function testDelegateForwardsArguments()
    {
        $mock = $this->getMockForAbstractClass('malkusch\phpmock\phpunit\MockDelegateFunction');
        
        $mock->expects($this->once())
             ->method(MockDelegateFunction::METHOD)
             ->with(1, 2);
        
        call_user_func($mock->getCallable(), 1, 2);
    }
}

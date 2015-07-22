<?php

/**
 * Copyright (c) 2015-present Ganbaro Digital Ltd
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the names of the copyright holders nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @category  Libraries
 * @package   DateTime/ValueBuilders
 * @author    Stuart Herbert <stuherbert@ganbarodigital.com>
 * @copyright 2015-present Ganbaro Digital Ltd www.ganbarodigital.com
 * @license   http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link      http://code.ganbarodigital.com/php-datetime
 */

namespace GanbaroDigital\DateTime\ValueBuilders;

use PHPUnit_Framework_TestCase;

/**
 * @coversDefaultClass GanbaroDigital\DateTime\ValueBuilders\BuildTimeoutAsFloat
 */
class BuildTimeoutAsFloatTest extends PHPUnit_Framework_TestCase
{
    /**
     * @coversNothing
     */
    public function testCanInstantiate()
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        $obj = new BuildTimeoutAsFloat;

        // ----------------------------------------------------------------
        // test the results

        $this->assertTrue($obj instanceof BuildTimeoutAsFloat);
    }

    /**
     * @covers ::__invoke
     * @dataProvider provideTimeoutsToTest
     */
    public function testCanUseAsObject($data, $expectedResult)
    {
        // ----------------------------------------------------------------
        // setup your test

        $obj = new BuildTimeoutAsFloat;

        // ----------------------------------------------------------------
        // perform the change

        $actualResult = $obj($data);

        // ----------------------------------------------------------------
        // test the results

        $this->assertEquals($expectedResult, $actualResult);
    }

    /**
     * @covers ::from
     * @dataProvider provideTimeoutsToTest
     */
    public function testCanCallStatically($data, $expectedResult)
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        $actualResult = BuildTimeoutAsFloat::from($data);

        // ----------------------------------------------------------------
        // test the results

        $this->assertEquals($expectedResult, $actualResult);
    }

    /**
     * @covers ::__invoke
     * @covers ::from
     */
    public function testReturnsNullWhenNoTimeoutsProvided()
    {
        // ----------------------------------------------------------------
        // setup your test

        $obj = new BuildTimeoutAsFloat;

        // ----------------------------------------------------------------
        // perform the change

        $actualResult1 = $obj(null, null);
        $actualResult2 = BuildTimeoutAsFloat::from(null, null);

        // ----------------------------------------------------------------
        // test the results

        $this->assertNull($actualResult1);
        $this->assertNull($actualResult2);
    }

    /**
     * @covers ::__invoke
     * @covers ::from
     * @dataProvider provideTimeoutsToTest
     */
    public function testReturnsDefaultTimeoutWhenNoOverrideProvided($defaultTimeout, $expectedResult)
    {
        // ----------------------------------------------------------------
        // setup your test

        $obj = new BuildTimeoutAsFloat;

        // ----------------------------------------------------------------
        // perform the change

        $actualResult1 = $obj($defaultTimeout, null);
        $actualResult2 = BuildTimeoutAsFloat::from($defaultTimeout, null);

        // ----------------------------------------------------------------
        // test the results

        $this->assertEquals($expectedResult, $actualResult1);
        $this->assertEquals($expectedResult, $actualResult2);
    }

    /**
     * @covers ::__invoke
     * @covers ::from
     * @dataProvider provideOverrideTimeoutsToTest
     */
    public function testCanOverrideDefaultTimeout($defaultTimeout, $overrideTimeout, $expectedResult)
    {
        // ----------------------------------------------------------------
        // setup your test

        $obj = new BuildTimeoutAsFloat;

        // ----------------------------------------------------------------
        // perform the change

        $actualResult1 = $obj($defaultTimeout, $overrideTimeout);
        $actualResult2 = BuildTimeoutAsFloat::from($defaultTimeout, $overrideTimeout);

        // ----------------------------------------------------------------
        // test the results

        $this->assertEquals($expectedResult, $actualResult1);
        $this->assertEquals($expectedResult, $actualResult2);
    }

    public function provideTimeoutsToTest()
    {
        return [
            [ 1, 1.0 ],
            [ 1.0, 1.0 ],
            [ "1", 1.0 ],
            [ "1.0", 1.0 ],
        ];
    }

    public function provideOverrideTimeoutsToTest()
    {
        return [
            [ 1, 3, 3.0 ],
            [ 1.0, 3.0, 3.0 ],
            [ "1", "3", 3.0 ],
            [ "1.0", "3.0", 3.0 ],
        ];
    }
}
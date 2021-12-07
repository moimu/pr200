<?php
declare(strict_types=1);

namespace Moi\Tests\ApiReceiveTest;

use Moi\Zonas\ApiReceive;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass Moi\Zonas\ApiReceive
 */
class ApiReceiveTest extends TestCase{

    /**
     * @covers ::__construct
     */
    public function testDevuelveTrueSiClassApiReceiveRetornaObj(){
        //given when
        $sut = new ApiReceive();
        //then
        $this -> assertIsObject($sut, "Class Api no retona Objeto");

    }

}
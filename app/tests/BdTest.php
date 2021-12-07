<?php
declare(strict_types=1);

namespace Moi\Tests\BdTest;

use Moi\Zonas\Bd;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass Moi\Zonas\BdTest
 */
class BdTest extends TestCase{

    /**
     * @covers ::__construct
     */
    public function testDevuelveTrueSiClassBdTestRetornaObjeto(){
        // given  when
        $sut = new Bd();
        // then
        $this -> assertIsObject( $sut, "Class Bd no retona Objeto" );
    }


}
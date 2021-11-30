<?php
declare(strict_types=1);

namespace Moi\Tests\ApiTest;

use Moi\Zonas\Api;
use PHPUnit\Framework\TestCase;
// use InvalidArgumentException;

/**
 * @coversDefaultClass Moi\Zonas\Api
 */
class ApiTest extends TestCase{

    /**
     * @covers ::__construct
     */
    public function testDevuelveTrueSiClassApiRetornaObjeto(){
        // given  when
        $sut = new Api();
        // then
        $this -> assertIsObject( $sut, "Class Api no retona Objeto" );
    }
    /**
     * @covers ::db
     */
    public function testDevuelveTrueSiDbInstanciadaEsObjeto(){
        // given 
        $api = new Api();
        // when
        $sut = $api -> db();
        // then
        $this -> assertIsObject( $sut, "bd no es objeto error!" );
    }
    /**
     * @covers ::consultas
     */
    public function testDevuelveTrueSiFxConsultasRetornaArray(){
        // given 
        $api = new Api();
        $db = $api -> db();
        // when
        $sut = $api -> consultas( $db );
        // then
        $this -> assertIsArray( $sut, "total de consultas no son Array" );
    }
    /**
     * @covers ::json
     */
    public function testDevuelveTrueSiFxJsonRetornaJsonEsperado(){
        // given 
        $api = new Api();
        $db = $api -> db();
        $array = $api -> consultas( $db );
        // when
        $sut = $api -> json( $array );
        // then
        $expectedJson = json_encode( $array );
        $this -> assertJsonStringEqualsJsonString( $expectedJson, $sut, "No es un objecto json" );
    }
}

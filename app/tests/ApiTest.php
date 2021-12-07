<?php
declare(strict_types=1);

namespace Moi\Tests\ApiTest;

use Moi\Zonas\Api;
use PHPUnit\Framework\TestCase;

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
     * @covers ::consultas
     */
    public function testDevuelveTrueSiFxConsultasRetornaArray(){
        // given 
        $api = new Api();
        // when
        $sut = $api -> consultas();
        // then
        $this -> assertIsArray( $sut, "total de consultas no son Array" );
    }

    /**
     * @covers ::json
     */
    public function testDevuelveTrueSiFxJsonRetornaJsonEsperado(){
        // given 
        $api = new Api();
        $array = $api -> consultas();
        // when
        $sut = $api -> json( $array );
        // then
        $expectedJson = json_encode( $array );
        $this -> assertJsonStringEqualsJsonString( $expectedJson, $sut, "No es un objecto json" );
    }
}

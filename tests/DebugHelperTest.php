<?php
namespace Tests;

use MichaelDrennen\DebugHelper\DebugHelper;
use PHPUnit\Framework\TestCase;

/**
 * Class DebugHelperTest
 * @package Tests
 */
class DebugHelperTest extends TestCase {

    public function testLaravelReturnQueryLogTableString () {

        $this->expectOutputRegex( '/-----------------------------------------------------------------------------------------------------------------------------------------------/' );
        $queryLogJsonContent = file_get_contents( 'https://raw.githubusercontent.com/michaeldrennen/DebugHelper/master/tests/testFiles/laravelQueryLog.json' );
        $queryLog            = json_decode( $queryLogJsonContent, true );
        $actualOutput        = DebugHelper::laravelPrintQueryLog( $queryLog, true );
        print( $actualOutput );
    }


    public function testLaravelPrintQueryLog () {

        try {
            $exception           = null;
            $queryLogJsonContent = file_get_contents( './tests/testFiles/laravelQueryLog.json' );
            $queryLog            = json_decode( $queryLogJsonContent, true );
            DebugHelper::laravelPrintQueryLog( $queryLog );
        } catch ( \Exception $exception ) {
        }
        $this->assertNull( $exception, "Unexpected exception thrown in test." );
    }




}
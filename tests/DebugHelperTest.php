<?php
namespace Tests;

use MichaelDrennen\DebugHelper\DebugHelper;
use PHPUnit\Framework\TestCase;

class DebugHelperTest extends TestCase {

    public function testPrintQueryLog () {

        $queryLogJsonContent = file_get_contents( './tests/testFiles/queryLog.json' );
        $queryLog            = json_decode( $queryLogJsonContent, true );
        print_r( $queryLog );
        DebugHelper::printLaravelQueryLog( $queryLog );
    }
}
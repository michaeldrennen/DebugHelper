<?php
namespace MichaelDrennen\DebugHelper;

use League\CLImate\CLImate;

class DebugHelper {

    /**
     * [0] => Array
     * (
     * [query] => select "accession_number" from "form_4_transaction_ledger_entries" where "rptOwnerCik" = ?
     * [bindings] => Array
     * (
     * [0] => 7446979409
     * )
     *
     * [time] => 0.19
     * )
     */
    /**
     * @param array $queryLog
     */
    public static function printLaravelQueryLog ( array $queryLog ) {

        $climate = new CLImate();

        $executableQueries = [];
        foreach ( $queryLog as $i => $log ):
            $executableQueries[] = self::getExecutableQueryFromLog( $log );
        endforeach;

        print_r( $executableQueries );
    }


    public static function getExecutableQueryFromLog ( array $log ): string {

        $log['query'] = str_replace( '"', '', $log['query'] );
        foreach ( $log['bindings'] as $i => $binding ):
            $log['query'] = str_replace( '?', "'" . $binding . "'", $log['query'] );
        endforeach;

        return $log['query'];

    }
}
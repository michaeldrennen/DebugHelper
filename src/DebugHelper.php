<?php
namespace MichaelDrennen\DebugHelper;

use League\CLImate\CLImate;

/**
 * Class DebugHelper
 * @package MichaelDrennen\DebugHelper
 */
class DebugHelper {

    /**
     * @param array $queryLog   A Laravel query log variable is a numerically indexed array of the queries that have been executed since you
     *                          enabled the DB query log with DB::enableQueryLog().
     *                          A line from a Laravel query log is an associative array with three elements:
     *                          - query
     *                          - bindings
     *                          - time
     *                          This method prints out the query log in a CLImate table.
     *
     * @link http://climate.thephpleague.com/
     */
    public static function laravelPrintQueryLog ( array $queryLog, bool $returnString = false ) {

        $climate = new CLImate();

        $arrayForPrinting = self::laravelGetArrayForPrinting( $queryLog );

        /**
         * @link http://climate.thephpleague.com/terminal-objects/table/
         */
        if ( $returnString ):
            return $climate->to( 'buffer' )->table( $arrayForPrinting )->output->get( 'buffer' )->get();
        endif;
        $climate->table( $arrayForPrinting );
    }


    /**
     * A wrapper method around my 'getters' that accepts the Laravel query log array, and returns an associative array that is meant to be
     * passed direction into the CLImate table() function.
     *
     * @param array $queryLog A Laravel query log array.
     *
     * @return array An associative array meant to be passed to the CLImate table() function.
     * @link http://climate.thephpleague.com/terminal-objects/table/
     */
    protected static function laravelGetArrayForPrinting ( array $queryLog ): array {

        $arrayForPrinting = [];
        foreach ( $queryLog as $i => $log ):
            $arrayForPrinting[] = ['query' => self::laravelGetExecutableQueryFromLog( $log ),
                                   'time'  => self::laravelGetTimeFromLog( $log ),];

        endforeach;

        return $arrayForPrinting;
    }


    /**
     * A 'getter' method that accepts a line from the Laravel query log array, and returns the executed query from that line.
     * This method does a very basic string replace of the query values for the ? placeholders in the query string.
     * @todo This method could benefit from a more robust approach to the query binding substituion.
     *
     * @param array $log A line from a Laravel query log.
     *
     * @return string The executed query from that log line with the query bindings substituted in for the ? placeholders.
     */
    protected static function laravelGetExecutableQueryFromLog ( array $log ): string {

        $log['query'] = str_replace( '"', '', $log['query'] );
        foreach ( $log['bindings'] as $i => $binding ):
            $numReplacementsToPerform = 1;
            $log['query']             = preg_replace( '/\?/', "'" . (string) $binding . "'", $log['query'], $numReplacementsToPerform );
        endforeach;

        return $log['query'];
    }


    /**
     * A 'getter' method that accepts a line from the Laravel query log array, and returns the execution time of that query.
     *
     * @param array $log A line from a Laravel query log.
     *
     * @return float The execution time of the query as a float.
     */
    protected static function laravelGetTimeFromLog ( array $log ): float {

        return (float) $log['time'];
    }
}
<?php

namespace helper;

/**
 * String Hilfsunktionen
 * @package helper
 * @author thorsten schoelzel<thorsten@earafour.de>
 * @version 1.0
 */
class string {

    /**
     * Kürzt einen String und liefert diesen zurück
     * @param string $string Der zu kürzende string
     * @param int $length Maximale Länge des zu kürzenden Strings
     * @return string
     */
    public static function shortString($string, $length) {
        if (strlen($string) < $length + 1) {
            return $string;
        } else {
            $length = $length - 3;
            do {
                $string = substr($string, 0, $length);
                $length = $length - 1;
            } while (substr($string, strlen($string) - 1, 1) != " " && strlen($string) > 0);
            return substr($string, 0, strlen($string) - 1) . '...';
        }
    }

}

?>

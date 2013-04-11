<?php

namespace singletons;

/**
 * Hält einen Dokumentkopf
 * @package singletons
 * @author thorsten schoelzel<thorsten@earafour.de>
 * @version 1.0
 * */
class head {

    /**
     * Ein Dokumentkopf
     * @var \view\html\head
     */
    private static $head = null;

    /**
     * Liefert einen Dokumentkopf
     * @return \view\html\head
     */
    public static function getHead() {
        if (self::$head === null) {
            self::$head = new \view\html\head();
        }
        return self::$head;
    }

}

?>

<?php

namespace view\html;

/**
 * Dokument Headerbereich
 * @package view\html
 * @author thorsten schoelzel<thorsten@earafour.de>
 * @version 1.0
 */
class header implements \interfaces\tostring {

    /**
     * Inhalt des Headerbereiches
     * @var array
     */
    private $inhalt = null;
    
    /**
     * Erzeugt eine Instanz der Klasse
     * @return self
     */
    public function __construct(){
        $this->inhalt = array();
    }
    
    /**
     * Hängt ein neues Element in den Header ein.
     * @var \interfaces\html_element
     */
    public function addElement( \interfaces\tostring $element ){
        array_push($this->inhalt, $element);
    }


}
?>

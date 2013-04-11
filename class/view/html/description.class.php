<?php
namespace view\html;

/**
 * Eine Dokumentbeschreibung
 * @package view\html
 * @author thorsten schoelzel<thorsten@earafour.de>
 * @version 1.0
 */
class description implements \interfaces\tostring {
    
    /**
     * Die Dokumentbeschreibung gekürzt auf 160 Zeichen
     * @var string
     */
    private $description = '';
    
    /**
     * Setzt die Dokumentbeschreibung, wenn die übergeben Zeichenkette
     * länger als 160 Zeichen ist, wird diese gekürzt.
     * @param string $description 
     */
    public function setValue( $description ){
        $this->description = \helper\string::shortString((string)$description,160);
    }
    
    /**
     * Erzeugt eine Instanz der Klasse
     * @param string $description Eine Dokumentbeschreibung
     * @return \view\html\description
     */
    public function __construct( $description = '' ){
        $this->setValue($description);
    }
    
    /**
     * Liefert die gespeicherte fassung der Dokumentbeschreibung
     * @return string
     */
    public function getValue(){
        return $this->description;
    }
    
    /**
     * Liefert den Tag einer Dokumentbeschreibung
     * @return string
     */
    public function __toString(){
        return sprintf('<meta name="description" content="%s">',$this->description);
    }
    
}

?>

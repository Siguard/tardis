<?php
namespace view\html\opengraph;

/**
 * Open Graph Description
 * @package view\html\opengraph
 * @author thorsten schoelzel<thorsten@earafour.de>
 * @version 1.0
 */
class description {
    
    /**
     * Die Dokumentbeschreibung
     * @var string
     */
    private $description = '';
    
    /**
     * Setzt die Dokumentbeschreibung
     * @param string $title Dokumenttitel
     */
    public function setDescription( $description ){
        $this->description = (string)$description;
    }
    
    /**
     * Liefert ddie Dokumentbeschreibung
     * @return string
     */
    public function getDescription(){
        return $this->description;
    }
    
    /**
     * Erzeugt eine Instanz der Klasse
     * @param string $title Der Dokumenttitel(Optional)
     */
    public function __construct ( $description = '' ){
        $this->setDescription($description);
    }
    
    /**
     * Liefert die Zeichenkette eines Open-Graph-Description-Tags
     * @return string
     */
    public function __toString(){
        return sprintf('<meta property="og:description" content="%s" />',$this->description);
    }
    
    
}
?>

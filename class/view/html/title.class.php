<?php
namespace view\html;

/**
 * HTML-Titel Tag
 * @package view\html
 * @author thorsten schoelzel<thorsten@earafour.de>
 * @version 1.0
 */
class title implements \interfaces\tostring {
    
    /**
     * Der Titel
     * @var string
     */
    private $value = '';
    
    /**
     * Setzt den Titel
     * @param string $value Setzt den Titel
     * @return void
     */
    public function setValue( $value ){
        $this->value = (string)$value;
    }
    
    /**
     * Liefert den Wert des Titels zurück
     * @return string
     */
    public function getValue(){
        return $this->value;
    }
    
    /**
     * Initialisiert eine Instanz der Klasse
     * @param string @value Setzt den Titel
     * @return \view\html\title
     */
    public function __construct( $value = '' ){
        $this->setValue($value);
    }
    
    /**
     * Liefert ein Titletag zurück
     * @return string
     */
    public function __tostring(){
        return sprintf('<title>%s</title>',$this->getValue());
    }
    
}
?>

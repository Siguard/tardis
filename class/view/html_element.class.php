<?php

namespace view;

/**
 * Erzeugt ein HTML-Element
 * @package view
 * @author thorsten schoelzel<thorsten@earafour.de>
 * @version 1.0
 */
class html_element implements \interfaces\html_element, \interfaces\tostring {

    /**
     * Liste von Attributen
     * @var array
     * */
    private $attributes = null;

    /**
     * Inhalt des Elements
     * @var mixed
     */
    private $nodeValue = null;

    /**
     * Tag Name des Elements
     * @var string
     */
    private $tagName = '';

    /**
     * Erzeugt eine Instanz der Klasse
     * @return self
     */
    public function __construct() {
        $this->attributes = array();
        $this->nodeValue = '';
    }

    /**
     * Setzt den Tag Namen
     * @param string $name Tag Name des Elements
     */
    public function setTagName($name) {
        $this->tagName = (string) $name;
    }

    /**
     * Liefert den Tag Namen des Elements
     * @return string
     */
    public function getTagName() {
        return $this->tagName;
    }

    /**
     * Liefert das Element als HTML-Tag Zeichenkette zurück
     * @return string
     */
    public function __tostring() {
        $out = sprintf('<%s', $this->tagName);
        foreach ($this->attributes as $key => $value) {
            $out = sprintf('%s %s="%s"', $out, $key, $value);
        }
        $out = sprintf('%s>%s</%s>', $out, (string) $this->nodeValue, $this->tagName);
        return $out;
    }

    /**
     * Setzt ein Attribut des Elements
     * @param string $key Schlüssel des Attributes
     * @param string $value Wert des Attributes
     */
    public function setAttribute($key, $value) {
        $this->attributes[(string)$key] = (string)$value;
    }

    /**
     * Liefert den Wert des gewünschten Attributs
     * @param string Der Schlüssel des Attributes
     * @return string
     */
    public function getAttribute($key) {
        return $this->attributes[$key];
    }

    /**
     * Liefert alle attribute als Schlüssel-Wert Paare in einem Array zurück
     * @return array
     */
    public function getAttributes() {
        return $this->attributes;
    }

    /**
     * Setzt den Inhalt des Elements
     * @param \interfaces\tostring $value 
     */
    public function setNodeValue($value) {
        $this->nodeValue = $value;
    }

    /**
     * Liefert den Inhalt des Elements zurück
     * @return \interfaces\tostring
     */
    public function getNodeValue() {
        return $this->nodeValue;
    }

}

?>

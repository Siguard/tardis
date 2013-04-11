<?php
namespace view\html;

/**
 * Eine Dokument Beziehung
 * @package view\html
 * @author thorsten schoelzel<thorsten@earafour.de>
 * @version 1.0
 */
class link implements \interfaces\tostring {
    
    /**
     * Element Attribute
     * @var array
     */
    private $attributes = null;
    
    /**
     * Erzeugt eine Instanz der Klasse
     * @param array $attributes Dictionary von erlaubten Attributen.
     */
    public function __construct( $attributes = '' ){
        $this->attributes = Array();
        if(is_array($attributes)){
            $this->attributes = $attributes;
        }
    }
    
    /**
     * Liefert den Zeichenketten-Tag einer Document Beziehung
     * @return string
     */
    public function __tostring(){
        $out = '<link ';
        ksort($this->attributes);
        foreach ( $this->attributes as $attribute => $value ){
            if(preg_match('/(id|lang|href|hreflang|type|rel|rev|target|media|charset)/',$attribute)){
             $out .= $attribute.'="'.$value.'" ';
            }
        }
        $out .= '/>';
        return $out;
    }
    
    /**
     * Erzuegt eine Dokumentbeziehung zum einen CascadingStyleSheet
     * @param string $href Ort der StyleSheet-Datei
     * @param type $media Typ des Medium Standard 'all'
     * @param type $type Typ des StyleSheet Dokuments Standard 'text/css'
     * @return self
     */
    public static function createCSSLink( $href='', $media='all', $type='text/css'){
        return new self(
                array( 'rel'=> 'Stylesheet'
                     , 'media' => $media
                     , 'type' => $type
                     , 'href' => $href
                    )
                );
    }
    
}
?>

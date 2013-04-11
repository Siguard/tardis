<?php
namespace interfaces;

interface html_element {
   
  /**
     * Methode welche implementiert werden muss
     * @return string
     */
   public function __tostring();

   public function setTagName( $name );
   
   public function getTagName();
   
   public function setAttribute( $key, $value );
   
   public function getAttribute( $key );
   
   public function getAttributes();
   
   public function setNodeValue( $value );
   
   public function getNodeValue();
      
}
?>

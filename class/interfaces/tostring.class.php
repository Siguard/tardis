<?php
namespace interfaces;
/**
 * Interface für Objecte welche eine __toString Methode enthalten müssen
 */
interface tostring {
    
    /**
     * Methode welche implementiert werden muss
     * @return string
     */
    public function __tostring();
}
?>

<?php
namespace controller\template;

/**
 * Smart Template Renderer
 * @package view\html
 * @author thorsten schoelzel<thorsten@earafour.de>
 * @version 1.0
 */
class smart {
    
    /**
     * Ersetzungen 
     * @var array
     */
    private $binding = array();
   
    /**
     * Template Zeichenkette
     * @var string
     */
    private $template = '';
    
    /**
     * Template Konfiguration
     * @var array
     */
    private $configuration = array();
    
    /**
     * Pfad zum Template (Default durch Template)
     * @var string
     */
    private $path = '';
    
    /**
    * Initialisiert eine Instanz der Klasse
    * @return \controller\template\smart
    */
    public function __construct(){
        // Laden der Konfiguration
        $this->configuration = parse_ini_file('configurations/template.configuration');
        $this->path = $this->configuration['defaultpath'];
    }
    
    /**
     * Bindet eine Ersetzung an einen Schlüssel(Key)
     * Die Ersettung muss eine __toString Methode enthalten
     * @param string $key Schlüssel der Ersetzung
     * @param \interface\tostring $value Die Ersetzung
     * @return void
     */
    public function bind( $key, \interfaces\tostring $value ){
        $this->binding[$key] = $value;
    }
    
    /**
     * Lädt das Template aus der angegebenen Datei
     * @param type $filename Dateinamen des zu ladenden Templates
     */
    public function loadTemplate( $filename ){
        $this->template = file_get_contents(sprintf('%s/%s',$this->path,$filename));
        
    }
    
    /**
     * wechselt den Pfad zum Template
     * @param string $path Der Pfad zum Template
     * @return void
     */
    public function changePath( $path ){
        if(is_dir((string)$path)){
            $this->path = (string)$path;
        }
    }
    
    /**
     * Liefert das Gerenderte Template als Zeichenkette zurück
     * @return string
     */
    public function __tostring(){
        $template = $this->template;
        foreach($this->binding as $key => $value){
            $template = preg_replace(sprintf('/@@@%s@@@/', $key),(string)$value,$template);
        }
        return $template;
    }
    
}
?>
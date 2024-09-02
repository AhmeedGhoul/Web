<?php
class Rendez_vous  {
  private $objet;
  private $id_rendez_vous;

    private $date_rendez_vous;
    private $IdDossier;

    function __construct($objet,$date_rendez_vous,$IdDossier) {
      $this->objet = $objet;
      $this->date_rendez_vous = $date_rendez_vous; 
      $this->IdDossier=$IdDossier;
    }
  
 
   
    function getIdDossier() {
        return $this->IdDossier;
      }

    function setobjet($objet) {
      $this->objet=$objet;
    }
  
    function setdate_rendez_vous($date_rendez_vous) {
      $this->date_rendez_vous=$date_rendez_vous;
    }
    function setIdDossier($IdDossier) {
         $this->IdDossier=$IdDossier;
      }
    

    
      function getobjet() {
        return $this->objet;
      }
    
      function getdate_rendez_vous() {
         return $this->date_rendez_vous;
      }
  }
  

?>
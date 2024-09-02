<?php
class Dossier {
  private $IdDossier;
    private $nom_patient;
    private $diagnostic;
    private $date_creation;
    private $imageData;
    private $imageType;

    function __construct($nom_patient, $imageData, $imageType,$diagnostic) {
      $this->nom_patient = $nom_patient;
      $this->diagnostic = $diagnostic;
      $this->date_creation = date('Y-m-d H:i:s');
      $this->imageData = $imageData;
      $this->imageType = $imageType;
  }
  function getImageData() {
    return $this->imageData;
}
function getdiagnostic() {
  return $this->diagnostic;
}


public function setdiagnostic($diagnostic)
{
    $this->diagnostic = $diagnostic;
}
public function setIdDossier($id)
{
    $this->IdDossier = $id;
}
function getImageType() {
    return $this->imageType;
}
  
    function getnom_patient() {
        return $this->nom_patient;
      }
  
  
  

    function setdate_creation($date_creation) {
      $this->date_creation=$date_creation;
    }
    function setnom_patient($nom_patient) {
         $this->nom_patient=$nom_patient;
      }
    
  
    
    
      function getdate_creation() {
         return $this->date_creation;
      }
      function getIdDossier() {
        return $this->IdDossier;
      }
  }
 


?>
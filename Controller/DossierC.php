<?php
include '../Model/Dossier.php';
include '../config.php';

class DossierC{


    function listDossier(){
        $sql="SELECT * FROM Dossier";
        $db=config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
        
            }
    function deleteDossier ($IdDossier){
        $sql="DELETE FROM Dossier WHERE IdDossier =:IdDossier";
$db=config::getConnexion();
$req = $db->prepare($sql);
$req->bindValue(':IdDossier', $IdDossier);

try {
    $req->execute();
} catch (Exception $e) {
    die('Error:' . $e->getMessage());
}

    }
    function addDossier($Dossier){
        $sql="INSERT INTO Dossier (date_creation,nom_patient,image_data,image_type,diagnostic) VALUES (:date_creation,:nom_patient,:image_data,:image_type,:diagnostic)";
        $db=config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute([
                'date_creation' => $Dossier->getdate_creation(),
                'nom_patient' => $Dossier->getnom_patient(),
                'image_data' => $Dossier->getImageData(),
                'image_type' => $Dossier->getImageType(),
                'diagnostic' => $Dossier->getdiagnostic()
            ]);
        }catch(Exception $e){
            echo "error=:".$e->getMessage();
        }
    }
     function updateDossier($Dossier,$IdDossier){
        try {
            $sql = "UPDATE Dossier SET nom_patient=:nom_patient,diagnostic=:diagnostic,image_Type=:image_type,image_Data=:image_data WHERE iddossier=:iddossier";
            $db = config::getConnexion();
            $query = $db->prepare($sql);
            $query->execute([
                'iddossier' => $IdDossier,
                'nom_patient' => $Dossier->getnom_patient(),
                'image_data' => $Dossier->getImageData(),
                'image_type' => $Dossier->getImageType(),
                'diagnostic' => $Dossier->getdiagnostic()
            ]);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
        
        function recupererDossier($IdDossier){
            $sql="SELECT * from Dossier where IdDossier=$IdDossier";
            $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        $query->execute();
        $Dossier = $query->fetch();
        return $Dossier;
        }catch (Exception $e){
            $e->getMessage();}
        }
         }



?>
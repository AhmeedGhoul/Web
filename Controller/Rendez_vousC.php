<?php
include '../Model/Rendez_vous.php';

class Rendez_vousC{


    function listRendez_vous($IdDossier){
        $sql="SELECT * FROM Rendez_vous  join Dossier on Rendez_vous.IdDossier=Dossier.IdDossier where Rendez_vous.IdDossier=$IdDossier ";
        $db=config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
        
            }
    function deleteRendez_vous ($IdRendez_vous){
        $sql="DELETE FROM Rendez_vous WHERE id_rendez_vous =:id_rendez_vous";
$db=config::getConnexion();
$req = $db->prepare($sql);
$req->bindValue(':id_rendez_vous', $IdRendez_vous);

try {
    $req->execute();
} catch (Exception $e) {
    die('Error:' . $e->getMessage());
}

    }
    function addRendez_vous($Rendez_vous){
        $sql="INSERT INTO Rendez_vous (objet,IdDossier,date_rendez_vous)VALUES(:objet,:IdDossier,:date_rendez_vous)";
        $db=config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute([
                'objet' => $Rendez_vous->getobjet(),
                'date_rendez_vous' => $Rendez_vous->getdate_rendez_vous(),
                'IdDossier' => $Rendez_vous->getIdDossier()
                
            ]);
        
        }catch(Exception $e){
            echo "error=:".$e->getMessage();
        
        
        }
        }
        function updateRendez_vous($Rendez_vous,$IdRendez_vous){
            try{
         
           
             $sql="UPDATE Rendez_vous SET objet=:objet,IdDossier=:IdDossier,date_rendez_vous=:date_rendez_vous  where id_rendez_vous=:id_rendez_vous";
         
             $db=config::getConnexion(); 
             $query = $db->prepare($sql);
             $query->execute([
               'objet' => $Rendez_vous->getobjet(),
               'id_rendez_vous' => $IdRendez_vous,
                'date_rendez_vous' => $Rendez_vous->getdate_rendez_vous(),
                'IdDossier' => $Rendez_vous->getIdDossier()
             ]);
         
         }catch(Exception $e){
             echo "error=:".$e->getMessage();
         }
         }
         
         
      
        
        function recupererRendez_vous($IdRendez_vous){
            $sql="SELECT * from Rendez_vous where id_rendez_vous=$IdRendez_vous";
            $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        $query->execute();
        $Rendez_vous = $query->fetch();
        return $Rendez_vous;
        }catch (Exception $e){
            $e->getMessage();}
        }
         
         function CountRendez_vous($IdDossier){
            $sql="SELECT count(IdRendez_vous) FROM Rendez_vous  join Dossier on Rendez_vous.IdDossier=Dossier.IdDossier where Rendez_vous.IdDossier=$IdDossier ";
            $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        $query->execute();
        $nb = $query->fetchColumn();
        return $nb;
        }catch (Exception $e){
            $e->getMessage();}
        }
         
    }


?>
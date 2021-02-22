<?php
//EXPORTATION DES DOSSIERS PATIENTS SOUS FORMAT PDF
require('../vendor2/autoload.php');
$con=mysqli_connect('localhost','nathan','oskour','hopital');
$res=mysqli_query($con,"select * from patient");
if(mysqli_num_rows($res)>0){
	//En tete du PDF
	$html='<style></style><table class="table">';
		$html.='<tr>
      <td>ID</td>
      <td>Nom</td>
      <td>Prénom</td>
      <td>Date de naissance</td>
      <td>Mail</td>
      <td>Adresse</td>
      <td>Mutuelle</td>
      <td>Sécurité Sociale</td>
      <td>Option chambre</td>
      <td>Régime</td>
          </tr>';
		//Données du PDF
		while($row=mysqli_fetch_assoc($res)){
			$html.='<tr>
      <td>'.$row['id'].'</td>
      <td>'.$row['nom'].'</td>
      <td>'.$row['prenom'].'</td>
      <td>'.$row['date_naissance'].'</td>
      <td>'.$row['mail'].'</td>
      <td>'.$row['adresse'].'</td>
      <td>'.$row['mutuelle'].'</td>
      <td>'.$row['num_sec_soc'].'</td>
      <td>'.$row['option_chambre'].'</td>
      <td>'.$row['regime'].'</td>

      </tr>';
		}
	$html.='</table>';
}else{
	$html="Data not found";
}
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file='media/'.date().'.pdf';
$mpdf->output($file,'I');
//D
//I
//F
//S
?>

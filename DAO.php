<?php
require_once("client.php");
require_once("produit.php");
require_once("categorie.php");
require_once("cmd.php");
require_once("fourniseur.php");
require_once("appro.php");
require_once("Administrateur.php");

class DAO{
	
	static function getPDO(){
		return new PDO("mysql:host=localhost;dbname=gestion_stock","root","");
	}

	static function enregistrerClient($id,$n,$a,$t,$e){
		$pdo=DAO::getPDO();
		$req="insert into client(id_client,nom,adresse,telephone,email) values('$id','$n','$a','$t','$e'); ";
		//echo $req;
		$res=$pdo->prepare($req);
		$res->execute(array());
		//echo "0000ok";
	}
	static function modifierClient($id_client,$n,$a,$t,$e){
		$pdo=DAO::getPDO();
		//$req=;
		//echo $req;
		$res=$pdo->prepare("update client set nom=?,adresse=?,telephone=?,email=? where id_client=$id_client;");
		$res->execute([$n,$a,$t,$e]);
	//	echo $res->rowCount()."records update successfully";
		//echo "0000ok";
	}
	static function supprimerClient($id_client){
		$pdo=DAO::getPDO();

		$res=$pdo->prepare("delete from client where id_client=?;");
		$res->execute([$id_client]);

		//echo "0000ok";
	}
	static function listClient(){
		$pdo=DAO::getPDO();
		$req="select id_client,nom,adresse,telephone,email from client; ";
		$res=$pdo->prepare($req);
		$res->execute(array());

		$lst=[];
		while($row=$res->fetch()){
			$lst[]=new client($row["id_client"],$row["nom"],$row["adresse"],$row["telephone"],$row["email"]);
		} return $lst;
}
static function listCmd(){
		$pdo=DAO::getPDO();
		$req="select * from commande; ";
		$res=$pdo->prepare($req);
		$res->execute(array());
		$lst=[];
		while($row=$res->fetch()){
			$lst[]=new cmd($row["numeroCmd"],$row["date"],$row["id_client"],$row['reference'],$row['qte']);
		} return $lst;
	}

	
 	static function enregistrerProduit($r,$l,$p,$q,$pa,$pv,$cat){
		$pdo=DAO::getPDO();
		$req="insert into produit(reference,libelle,prixUnitaire,stock,prixA,prixV,id_cat) values('$r','$l','$p','$q','$pa','$pv','$cat'); ";
	$res=$pdo->prepare($req);
		$res->execute(array());
	
 	}

 	static function listproduit(){
		$pdo=DAO::getPDO();
		$req="select reference,libelle,prixUnitaire,stock,prixA,prixV,id_cat from produit; ";
		$res=$pdo->prepare($req);
		$res->execute(array());

		$lst=[];
		while($row=$res->fetch()){
			$lst[]=new produit($row["reference"],$row["libelle"],$row["prixUnitaire"],$row["stock"],$row["prixA"],$row["prixV"],$row["id_cat"]);
		} return $lst;
}

static function modifierProduit($ref,$lib,$pu,$Q,$pa,$pv,$id_cat){
		$pdo=DAO::getPDO();
		$res=$pdo->prepare("update produit set libelle=?,prixUnitaire=?,stock=?,prixA=?,prixV=?,id_cat=? where reference=?;");
		$res->execute([$lib,$pu,$Q,$pa,$pv,$id_cat,$ref]);
	}
	static function supprimerProduit($ref){
		$pdo=DAO::getPDO();

		$res=$pdo->prepare("delete from produit where reference=?;");
		$res->execute([$ref]);

	}
	static function search($ref){
		$pdo=DAO::getPDO() ;
	    $pd = $pdo->prepare("select * from produit where reference=?") ;
	    $pd->execute(array($ref)) ;
        $lst=[];
		if($row=$pd->fetch()){
			$lst[]=new produit($row["reference"],$row["libelle"],$row["prixUnitaire"],$row["stock"],$row["prixA"],$row["prixV"],$row["id_cat"]);
		} return $lst;
	}
	static function affiche($n){
		$pdo=DAO::getPDO() ;
	    $pd = $pdo->prepare("SELECT * FROM `produit` WHERE `id_cat`=$n") ;
	    $pd->execute(array()) ;
        $lst=[];
		while($row=$pd->fetch()){
	        $lst[]=new produit($row["reference"],$row["libelle"],$row["prixUnitaire"],$row["stock"],$row["prixA"],$row["prixV"],$row["id_cat"]);
		} return $lst;
	}
	function authentification($login,$password){
		$pdo=$this->getPDO();
		$res=$pdo->prepare("SELECT login,password FROM admin where login=? and password =? ;");
		$res->execute(array($login,$password));
		if($res->fetch()) return True;
		return False;
	}

	static function enregistrerCmd($numeroCmd,$date,$id_client,$ref,$qte){
	$pdo=DAO::getPDO();
	$req="insert into commande(numeroCmd,date,id_client,reference,qte) values('$numeroCmd','$date','$id_client','$ref','$qte'); ";
	echo $req;
	$res=$pdo->prepare($req);
	$res->execute(array());
}
    
    static function enregistrerCat($id,$desc){
		$pdo=DAO::getPDO();
		$res=$pdo->prepare("insert into categorie values(?,?);");
		$res->execute(array($id,$desc));
	}
	static function modifierCtg($i,$d){
		$pdo=DAO::getPDO();
		$req=$pdo->prepare("UPDATE `categorie` SET `id_cat`=?,`desc`=? WHERE `id_cat`=$i");
		$req->execute(array($i,$d));
	}
	static function supprimerCat($id){
		$pdo=DAO::getPDO();

		$res=$pdo->prepare("delete from categorie where id_cat=?;");
		$res->execute([$id]);
	}
	static function listCat(){
		$pdo=DAO::getPDO();
		$req="select *from categorie; ";
		$res=$pdo->prepare($req);
		$res->execute(array());
		$lst=[];
		while($row=$res->fetch()){
			$lst[]=new categorie($row["id_cat"],$row["desc"]);
		} return $lst;
}

 	static function enregistrerfourniseur($i,$n,$a,$t,$e){
 		$pdo=DAO::getPDO();
 		$req="insert into fourniseur(id_f,nom,adresse,telephone,email) values('$i','$n','$a','$t','$e'); ";
//echo $req;
        $res=$pdo->prepare($req);
 		$res->execute(array());
 		//echo "0000ok";
	}
 	static function modifierfourniseur($id_f,$n,$a,$t,$e){
 		$pdo=DAO::getPDO();
 		$res=$pdo->prepare("UPDATE `fourniseur` SET `nom`=?,`adresse`=?,`telephone`=?,`email`=? WHERE `id_f`=$id_f");
 		$res->execute([$n,$a,$t,$e]);
 	}
 	static function supprimerfourniseur($id_f){
 		$pdo=DAO::getPDO();

 		$res=$pdo->prepare("delete from fourniseur where id_f=?;");
 		$res->execute([$id_f]);

 		//echo "0000ok";
 	}
	static function listfourniseur(){
 		$pdo=DAO::getPDO();
		$req="select id_f,nom,adresse,telephone,email from fourniseur; ";
		$res=$pdo->prepare($req);
		$res->execute(array());
 		$lst=[];
 		while($row=$res->fetch()){
 			$lst[]=new fourniseur($row["id_f"],$row["nom"],$row["adresse"],$row["telephone"],$row["email"]);
 		} return $lst;

 }
 static function enregistrerappro($i,$d,$if,$ref,$Q){
		$pdo=DAO::getPDO();
		$req="insert into approvisionnement(numero,date,id_f,reference,qte) values('$i','$d','$if','$ref','$Q'); ";
	    $res=$pdo->prepare($req);
		$res->execute(array());
	
 	}
	static function listappros(){
		$pdo=DAO::getPDO();
		$req="select *from approvisionnement; ";
		$res=$pdo->prepare($req);
		$res->execute(array());
		$lst=[];
		while($row=$res->fetch()){
			$lst[]=new appro($row["numero"],$row["date"],$row["id_f"],$row["reference"],$row["qte"]);
		} return $lst;
}
static function modifierappro($i,$d,$f,$r,$q){
 		$pdo=DAO::getPDO();
 		$res=$pdo->prepare("UPDATE `approvisionnement` SET `date`=?,`id_f`=?,`reference`=?,`qte`=? WHERE `numero`= $i;");
 		$res->execute([$d,$f,$r,$q]);
 	}
 	static function supprimerAppro($id){
		$pdo=DAO::getPDO();
		$res=$pdo->prepare("delete from approvisionnement where numero=?;");
		$res->execute([$id]);
	}
	 static function enregistrerUser($l,$p,$h){
		$pdo=DAO::getPDO();
		$req="insert into admin(login,password,photo) values('$l','$p','$h'); ";
	    $res=$pdo->prepare($req);
		$res->execute(array());
 	}
 	static function listUser(){
		$pdo=DAO::getPDO();
		$req="select *from admin; ";
		$res=$pdo->prepare($req);
		$res->execute(array());
		$lst=[];
		while($row=$res->fetch()){
			$lst[]=new Administrateur('',$row["login"],$row["password"],$row["photo"]);
		} return $lst;
}

static function nbrfournisseur(){
	$pdo=DAO::getPDO();
	$req="SELECT `id_f` FROM `fourniseur`";
	$res=$pdo->prepare($req); 
	$res->execute();
	 return $res->rowCount();
}
static function nbrclient(){
	$pdo=DAO::getPDO();
	$req="SELECT `id_client` FROM `client`";
	$res=$pdo->prepare($req); 
	$res->execute();
	 return $res->rowCount();
}

static function nbrcommande(){
	$pdo=DAO::getPDO();
	$req="SELECT `numeroCmd` FROM `commande`";
	$res=$pdo->prepare($req); 
	$res->execute();
	 return $res->rowCount();
}
static function nbrproduit(){
	$pdo=DAO::getPDO();
	$req="SELECT `reference` FROM `produit`";
	$res=$pdo->prepare($req); 
	$res->execute();
	 return $res->rowCount();
}
static function nvticket(){
     $pdo=DAO::getPDO();
     $req="insert into ticket(libelle,qte) values(?,?,?)";
     $res=$pdo->prepare($req); 
     $res->execute(array());
}
static function calcul(){
	 $pdo=DAO::getPDO();
     $req="select libelle,qte,prixUnitaire*qte
            from ticket t join produit p
            on p.libelle=p.libelle";
     $res=$pdo->prepare($req); 
     $res->execute(array());
}


 

static function list($id){
		$pdo=DAO::getPDO();
		$req="select nom,adresse,telephone,email from client where id_client=$id; ";
		$res=$pdo->prepare($req);
		$res->execute(array());

		$lst=[];
		while($row=$res->fetch()){
			$lst[]=new client('',$row["nom"],$row["adresse"],$row["telephone"],$row["email"]);
		} return $lst;
}
static function pu($n){
		$pdo=DAO::getPDO() ;
	    $pd = $pdo->prepare("SELECT `prixUnitaire` FROM `produit` WHERE `id_cat`=$n") ;
	    $pd->execute(array()) ;
        $lst=[];
		while($row=$pd->fetch()){
	        $lst[]=new produit($row["reference"],$row["libelle"],$row["prixUnitaire"],$row["stock"],$row["prixA"],$row["prixV"],$row["id_cat"]);
		} return $lst;
	}

  
 

   static function modifierqst($ref,$qst){
   $pdo=DAO ::getPDO();
    $pdostat=$pdo->prepare('update produit set stock=stock - ? where reference= ? LIMIT 1;');
    $execute = $pdostat->execute(array($qst,$ref));
  }
    
 static function modifierqst2($ref,$qst){
  $pdo=DAO ::getPDO();
    $pdostat=$pdo->prepare('update produit set stock= stock + ? where reference= ? LIMIT 1;');
    $execute = $pdostat->execute(array($qst,$ref));
  }


// static function enregistrerCmd($numeroCmd,$date,$id_client){
// 	$pdo=DAO::getPDO();
// 	$req="insert into commande(numeroCmd,date,id_client) values('$numeroCmd','$date','$id_client'); ";
// 	echo $req;
// 	$res=$pdo->prepare($req);
// 	$res->execute(array());

// }
// static function listCmd(){
// 	$pdo=DAO::getPDO();
// 	$req="select * from commande; ";
// 	$res=$pdo->prepare($req);
// 	$res->execute(array());
// 	$lst=[];
// 	while($row=$res->fetch()){
// 		$lst[]=new cmd($row["numeroCmd"],$row["date"],$row["id_client"]);
// 	} return $lst;
// }
// static function modifierCmd($numeroCmd,$date,$id_client){
// 	$pdo=DAO::getPDO();
// 	//$req=;
// 	//echo $req;
// 	$res=$pdo->prepare("update commande set date=?,id_client=? where numeroCmd=$numeroCmd;");
// 	$res->execute([$date,$id_client]);
// //	echo $res->rowCount()."records update successfully";
// 	//echo "0000ok";
// }
// static function supprimerCmd($numeroCmd){
// 	$pdo=DAO::getPDO();

// 	$res=$pdo->prepare("delete from commande where numeroCmd=?;");
// 	$res->execute([$numeroCmd]);

// 	//echo "0000ok";
// }

 



    static function GetMostcommande(){  #fi dashboard hadi  pour analyse 
    $pdo=DAO ::getPDO();
    $req="SELECT *
    FROM client AS c,commande AS v,produit AS p
    WHERE v.reference=p.reference AND v.id_client=c.id_client
    GROUP BY v.numeroCmd #p.id hiya plus correct ;
    ORDER BY SUM(p.prixV) DESC LIMIT 10;"; 
    $res = $pdo->prepare($req) ;
    $a=$res->execute() ;
    return $res->fetchAll();
  }
}
?>
<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/18/16
 * Time: 7:45 PM
 */

namespace App\Tools;


use App\Etat;

class EtatTools{

    public static function addEtat($lib){
        $e = new Etat();
        $e->libelle = $lib;
        $e->save();
        return $e;
    }

    public static function getAllEtat(){
        return Etat::all();
    }

    public static function getEtatByName($name){
        return Etat::where('libelle',$name)->get()->first();
    }

    public static function getEtatById($id){
        return Etat::find($id);
    }

    public static function getClassById($id){
        $etat = EtatTools::getEtatById($id);
        $ret = "default";
        if($etat->libelle == "Créée") $ret = "success";
        if($etat->libelle == "En cours") $ret = "primary";
        if($etat->libelle == "Traitée") $ret = "info";
        if($etat->libelle == "Archivée") $ret = "warning";
        if($etat->libelle == "Expirée") $ret = "danger";
        return $ret;
    }

}
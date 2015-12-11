<?php

/**
 * L'id, le texte, la date, les sous-message et 
 * l'id du message parent seront get et set
 *
 * @author Gabriel Morin et Nicolas Bouchard
 */
class Forum {
    
    private $id;
    private $texte;
    private $date;
    private $sous_message;
    private $id_message_parent;
    
    public function __construct($p_id,$p_texte,$p_date,$p_sous_message,$p_id_message_parent) {
        $this->setId($p_id);
        $this->setTexte($p_texte);
        $this->setDate($p_date);
        $this->setSousMessage($p_sous_message);
        $this->setIdMessageParent($p_id_message_parent);
        
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($p_id){
        $this->id = $p_id;
    }
    
    public function getTexte(){
        return $this->texte;
    }
    
    public function setTexte($p_texte){
        $this->texte = $p_texte;
    }
    
    public function getDate(){
        return $this->date;
    }
    
    public function setDate($p_date){
        $this->date = $p_date;
    }
    
    public function getSousMessage(){
        return $this->sous_message;
    }
    
    public function setSousMessage($p_sous_message){
        $this->sous_message = $p_sous_message;
    }
    
    public function getIdMessageParent(){
        return $this->id_message_parent;
    }
    
    public function setIdMessageParent($p_id_message_parent){
        $this->id_message_parent = $p_id_message_parent;
    }
    
}

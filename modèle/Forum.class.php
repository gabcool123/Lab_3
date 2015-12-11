<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * titre du forum, id du forum et 
 * tous les message directement sous le forum serons get et set
 *
 * @author Gabriel Morin et Nicolas Bouchard
 */
class Message {
    private $titre;
    private $ForumID;
    private $messages_forum;
    
    
    public function __construct($p_titre, $p_ForumID, $p_messages_forum) {
        $this->setTitre($p_titre);
        $this->setForumID($p_ForumID);
        $this->setMessagesForum($p_messages_forum);
    }
    
    public function getTitre(){
        return $this->titre;
    }
    
    public function setTitre($p_titre){
        $this->titre = $p_titre;
    }
    
    public function getForumID(){
        return $this->ForumID;
    }
    
    public function setForumID($p_ForumID){
        $this->ForumID = $p_ForumID;
    }
    
    public function getMessagesForum(){
        return $this->messages_forum;
    }
    
    public function setMessagesForum($p_messages_forum){
        $this->messages_forum = $p_messages_forum;
    }
}

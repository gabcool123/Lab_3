
<?php 
           
            
            
            if(isset($_POST['valider']))
            {
                session_start();
                
                $utilisateur = $_SESSION['utilisateur'];
               $forumTitre = $_SESSION['forum_choices'];
               
               echo $utilisateur;
               echo $forumTitre;
                
                try{
                        $bdd = new PDO('mysql:host=localhost;dbname=laboratoire_3', 'root','');
                    }catch(Exception $e){
                        die('Il y a une erreur en se connectant à la base de données: ' + $e->getMessage());
                    }
                    
                    $comment = htmlspecialchars($_POST['comment']);
                    
                    
                    $idMembre = $bdd->query("SELECT id FROM membres WHERE nom_utilisateur='$utilisateur'");
                    $idForum = $bdd->query("SELECT ForumID FROM forum WHERE titre='$forumTitre'");
                    
                   
                    $dataMembre = $idMembre->fetch();
                    $dataForum = $idForum->fetch();
                    
                    echo $dataMembre['id'];
                    echo $dataForum['ForumID'];
                   
                    
                    $membreID = $dataMembre['id'];
                    $forumID = $dataForum['ForumID'];
                    
                    $com = $bdd->prepare('INSERT INTO message(membres_id,horoDate,forum_ForumID,texte) VALUES(:membres_id,:horoDate,:forum_ForumID,:texte)');
                    $com->bindValue(':membres_id', $membreID);
                    $com->bindValue(':horoDate', date('Y-m-d H:i:s'));
                    $com->bindValue(':forum_ForumID', $forumID);
                    $com->bindValue(':texte', $comment);
                    
                    
                    $com->execute();
                            
        
                    
                   
                    
                   
                    
                    
                    
                   header('Location:index.php?page=forum');
                    
            }
                    
         
                    
    
    
    ?>

<form method="POST" action="comment.php">
    
  
    <h1>Commentez</h1>
    <textarea rows="10" cols="70" name="comment" id="com" placeholder="Votre commentaire..." required="true">
        
    </textarea><br>
    <a href="index.php?page=forum"><button type="button" class="btn btn-primary">Retour au forum</button></a>                <button type="submit" name="valider" class="btn btn-danger">Commentez</button>
</form>


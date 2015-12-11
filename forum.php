<?php 


try{
                                                $bdd = new PDO('mysql:host=localhost;dbname=laboratoire_3', 'root','');
                                            }catch(Exception $e){
                                             die('Il y a une erreur en se connectant à la base de données: ' + $e->getMessage());
                                             }

?>

<form method="POST" action="index.php?page=forum">
    
    
    <table style="text-align: left;width: 400px;font-size: 18px;font-family: 'Dosis',Impact,sans-serif;font-weight: bold;height: 200px;" >
        
      
        
        
        
        <tr>
            <td style="border-bottom: 1px black inset;">Choix de forums:</td>
            
        </tr>
        <tr>
            <td>Programmation</td><td><input type="radio" name="forum_choices" value="Programmation"></td>
        </tr>
        <tr>
            <td>Reseau</td><td><input type="radio" name="forum_choices" value="Reseau"></td>
        
        </tr>
        <tr>
            <td>Etude</td><td><input type="radio" name="forum_choices" value="Etude"></td>
        </tr>
     
        <tr>
            <td><button type="submit" class='btn btn-danger'>Charger le forum</button></td>
            
        </tr>
        
        <tr><td style="display: none;" class='comment'><a href="index.php?page=comment"><button type="button" class="btn btn-danger">Commenter</button></a></td></tr>
            
    </table>
    
    
</form>



<?php 

    if(isset($_POST['forum_choices']) || isset($_GET['forum_choices'])){
        $_SESSION['forum_choices'] = $_POST['forum_choices'];
        $_GET['forum_choices'] = $_SESSION['forum_choices'];
        
        ?>

<script type="text/javascript">
        $('.comment').css('display','block');
    
    
        </script>
        <?php
        if($_POST['forum_choices'] == 'Programmation'){

            
             //forum de programmation

            
            
            $forumProg = $bdd->query('SELECT * FROM message,membres WHERE forum_ForumID=1 AND membres.id=message.membres_id ORDER BY horoDate');

            while($row = $forumProg->fetch()){
                
                ?>
                
        <div class="message" style="padding-top: 2%;padding-left: 1%;padding-right: 1%;">
            
            
            
            <p style="border:1px orange solid;background-color: rgba(255, 178, 111,0.6);width: 50%;margin-left: 25%;"><?php echo $row['texte']; ?></p><br><br>
                <p style="text-align: left;"><span>par: <?php echo $row['nom_utilisateur']; ?></span><span style="position: absolute;right: 6%;"> à: <?php echo $row['horoDate']; ?></span></p>
                <p style="text-align: right;margin-right: 1%;"><a href="repondre.php"><button type="button" class="btn btn-danger">Répondre</button></a></p>
        </div>
                <?php
            }


        }else if($_POST['forum_choices'] == 'Reseau'){

            //forum du reseau

            
            
            try{
                                                $bdd = new PDO('mysql:host=localhost;dbname=laboratoire_3', 'root','');
                                            }catch(Exception $e){
                                             die('Il y a une erreur en se connectant à la base de données: ' + $e->getMessage());
                                             }

            $forumProg = $bdd->query('SELECT * FROM message,membres WHERE forum_ForumID=2 AND membres.id=message.membres_id ORDER BY horoDate');

            while($row = $forumProg->fetch()){
                
                ?>
                
        <div class="message">
            <p><?php echo $row['texte']; ?></p><br><br>
            <p style="text-align: left;"><span>par: <?php echo $row['nom_utilisateur']; ?></span><span style="position: absolute;right: 6%;"> à: <?php echo $row['horoDate']; ?></span></p>
            <p style="text-align: right;margin-right: 1%;"><a href="repondre.php"><button type="button" class="btn btn-danger">Répondre</button></a></p>
            
        </div>
                <?php
            }


        }else if($_POST['forum_choices'] == 'Etude'){

            //forum de l'etude

            
           try{
                                                $bdd = new PDO('mysql:host=localhost;dbname=laboratoire_3', 'root','');
                                            }catch(Exception $e){
                                             die('Il y a une erreur en se connectant à la base de données: ' + $e->getMessage());
                                             }

            $forumProg = $bdd->query('SELECT * FROM message,membres WHERE forum_ForumID=3 AND membres.id=message.membres_id ORDER BY horoDate');

            while($row = $forumProg->fetch()){
                
                
                
                ?>
                
        <div class="message">
            <p><?php echo $row['texte']; ?></p><br><br>
            <p style="text-align: left;"><span>par: <?php echo $row['nom_utilisateur']; ?></span><span style="position: absolute;right: 6%;"> à: <?php echo $row['horoDate']; ?></span></p>
            <p style="text-align: right;margin-right: 1%;"><a href="repondre.php"><button type="button" class="btn btn-danger">Répondre</button></a></p>
        </div>
                <?php
            }


        }
    }



?>

        




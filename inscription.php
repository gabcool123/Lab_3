

<form method="POST" action="index.php?page=inscription" style="width: 40%;margin-left:30%;">
    <?php 
    if(isset($_POST['submit'])){
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $username = htmlspecialchars($_POST['username_register']);
        $password = htmlspecialchars(sha1($_POST['password_register']));
        $repassword = htmlspecialchars(sha1($_POST['repassword_register']));
        $email = htmlspecialchars($_POST['email']);
        
        
        if(!empty($firstname) && !empty($lastname) && !empty($username) && !empty($password) && !empty($repassword) && !empty($email)){
            if(strlen($username) >= 5 && strlen($username) <= 16){
                if($password == $repassword){
                    
                    try{
                        $bdd = new PDO('mysql:host=localhost;dbname=laboratoire_3', 'root','');
                    }catch(Exception $e){
                        die('Il y a une erreur en se connectant à la base de données: ' + $e->getMessage());
                    }
                    
                    $bothSame = $bdd->prepare("SELECT nom_utilisateur FROM membres WHERE nom_utilisateur = ':user'");
                    $bothSame->bindParam(':user', $username);
                    $bothSame->execute();
                    
                    if($bothSame->rowCount() > 0)
                    {
                        echo 'Désolé l\'utilisateur que vous essayer de prendre est déjà utilisé dans la base de données'
                        . 'Veuillez en choisir un autre.';
                    }
                    else{
                        
                         
                        
                        $req = $bdd->prepare('INSERT INTO membres(prenom, nom_famille, nom_utilisateur, mot_de_passe, adresse_email, date_inscription) VALUES(:firstname,:lastname,:utilisateur, :password, :email, :date)');
                        $req->bindValue(':firstname', $firstname);
                        $req->bindValue(':lastname', $lastname);
                        $req->bindValue(':utilisateur', $username);
                        $req->bindValue(':password', $password);
                        $req->bindValue(':email', $email);
                        $req->bindValue(':date', date('Y-m-d H:i:s'));

                        $req->execute();
                        
                        $select = $bdd->query('SELECT * FROM membres');
                        
                        while($donnees = $select->fetch()){
                            $_SESSION['firstname'] = $donnees['prenom'];
                            $_SESSION['lastname'] = $donnees['nom_famille'];
                            $_SESSION['email'] = $donnees['adresse_email'];
                            $_SESSION['utilisateur'] = $donnees['nom_utilisateur'];
                        }
                        
                        $select->closeCursor();
                        
                        header( "refresh:5;url=index.php?page=accueil" );
                        
                        die('<font size="34">Bonjours'.' '.$_SESSION['utilisateur'].' ,vous serez redirigez sous peu</font>');
                           
                        

                        
                    }
                    
                    
                    
                    
                }
            }
        }
    }

?>
    <h1 style="border-bottom: 2px solid #3E4147">Inscription</h1><br><br>
    <label for="firstname">Entrez votre prénom: </label><input class="form-control" id="firstname" name="firstname" type="text" placeholder="Gabriel" required="true" value="<?php if(isset($firstname)){echo $firstname;} ?>"><br>
    <label for="lastname">Entrez votre nom de famille: </label><input class="form-control" id="lastname" name="lastname" type="text" required="true" value="<?php if(isset($lastname)){echo $lastname;} ?>"><br>
    <label for="username_register">Entrez votre nom d'utilisateur: </label><input class="form-control" id="username_register" name="username_register" type="text" required="true" value="<?php if(isset($username)){echo $username;} ?>"><br>
    <label for="password_register">Entrez votre mot de passe: </label><input class="form-control" id="password_register" name="password_register" type="password" required="true"><br>
    <label for="repassword_register">Entrez votre mot de passe de nouveau: </label><input class="form-control" id="repassword_register" name="repassword_register" type="password" required="true"><br>
    <label for="email">Entrez votre adresse courriel: </label><input class="form-control" id="email" name="email" type="email" placeholder="example123@example.com" required="true" value="<?php if(isset($email)){echo $email;} ?>"><br><br><br>
    <input type="submit" class="form-control" id="submit" name="submit" value="S'inscrire" style="width: 15%;margin-left: 41%;"><a href="index.php?page=accueil"><button type="button" class="btn btn-primary" style="margin-right:100%;">Retour à l'accueil</button></a>
</form>




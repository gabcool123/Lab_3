
<div class="top">
                <div class="main_title">
                    <h1>Forum - Laboratoire 3</h1>
                </div>
            
            
                
                    <div class="login_top">
                            <?php 
                                    
                                
                                    if(isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['password'])){
                                        $username_login = htmlspecialchars($_POST['username']);
                                        $password_login = htmlspecialchars(sha1($_POST['password']));
                                        
                                         try{
                                            $bdd = new PDO('mysql:host=localhost;dbname=laboratoire_3', 'root','');
                                        }catch(Exception $e){
                                         die('Il y a une erreur en se connectant à la base de données: ' + $e->getMessage());
                                         }                   
                                        
                                        $log = $bdd->query("SELECT * FROM membres WHERE nom_utilisateur='$username_login' AND mot_de_passe='$password_login'");
                                        
                                        if($log->rowCount() == 1)
                                        {
                                            $_SESSION['utilisateur'] = $username_login;
                                            while($row = $log->fetch())
                                            {
                                                $_SESSION['firstname'] = $row['prenom'];
                                                $_SESSION['lastname'] = $row['nom_famille'];
                                                $_SESSION['email'] = $row['adresse_email'];
                                                $_SESSION['date'] = $row['date_inscription'];
                                            }
                                            
                                            header("Location:index.php?page=forum");
                                     
                                        }
                                        else{
                                            echo 'Le nom d\'utilisateur ou le mot de passe sont incorrects!';
                                        }
                                        
                                        $log->closeCursor();
                                        
                                  
                                        
                                        
                                    }
                                
                                        
                                
                                
                                
                                ?>
                        
                            <?php if(isset($_SESSION['utilisateur'])){
                    
                                echo '<font style="font-size:20px;"><span style="color:silver;">Welcome, </span><a href="index.php?page=profile" style="text-decoration:none;" class="session_user_link">'.$_SESSION['utilisateur'].'</a></font>'.'<br><br><a href="index.php?page=profile" style="margin-right:10px;"><button class="btn btn-primary">Votre profil</button></a><a href="index.php?page=forum"><button class="btn btn-primary">Forum</button></a><a href="index.php?page=deconnexion" style="margin-left: 10px;"><button class="btn btn-primary">Deconnexion</button></a>';
                    
                            } else {
                            
                            
                            ?>
                            <form method="POST" action="index.php?page=accueil" class="form-inline">
                                
                                
                                <div class="form-group">
                                    <label for="username">Nom d'utilisateur: </label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="test123">
                                </div>

                                <div class="form-group">
                                    <label for="password">Mot de passe: </label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="#tyErT123">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Se connecter</button>
                                <a href="index.php?page=inscription"><button type="button" class="btn btn-default">S'inscrire</button></a>
                            </form>
                         <hr style="width: 50%;">
                         
                            <?php } ?>

                        </div>
            
            
                
        </div>
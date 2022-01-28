<?php 
require "internal_part/serv/config.php";

session_start();
?>
<!DOCTYPE html>
 <html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <title></title>
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
           
            <div class="codrops-top">


                <div class="clr"></div>
            </div>
            <?php if(isset($_SESSION['user'])){?>
            <div class="containerinfo">

           
       
		
            <div class="tabs_involved_n " ><a  href="../internal_part/serv/obr.php/?exit=1"><img src="images/dor.png" alt="Avatar" class="avatarv"></a></div>
            <div class=" " ><img src="<?php if($_SESSION['user']->$avatar!=''){echo "images/img_avatar.png";} else{echo "images/img_avatar.png"; }?>" alt="Avatar" class="avatark"></div>
        
            <?php if(isset($_GET['chuser'])){
               
            ?>
            <form    action="../internal_part/serv/obr.php/?chuser=<?php echo($_SESSION['user']->id); ?>" method="post"  enctype="multipart/form-data">
                        
                <input  name="name" required="required" type="text"  value="<?php echo $_SESSION['user']->name;?>" >
                <input  name="last" required="required" type="text"   value="<?php echo $_SESSION['user']->lastname; ?>" >
                <textarea name="comm" cols="20" rows="3" placeholder="Сomments"   ><?php echo $_SESSION['user']->comments;?></textarea>
               
                <input type="submit" name="submit" value="Редактировать">
            </form>
            <?php } else{?>
                <form    action="/?pag=home&chuser=<?php echo($_SESSION['user']->id); ?>" method="post"  enctype="multipart/form-data">
                <p><?php echo $_SESSION['user']->name;?></p>
                <p><?php echo $_SESSION['user']->lastname;?></p>
                <textarea name="comment" cols="20" rows="3" placeholder="Сomments" disabled="disabled"  ><?php echo $_SESSION['user']->comments;?></textarea>
                <input type="submit" name="submit" value="Редактировать">
            </form>
                <?php }?>
            </div>
            
            <?php }
            if($_GET['pag']=='authorization'){
            ?>

            <section>
                <div id="container_demo" >
          
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="../internal_part/serv/obr.php" method="get" >
                                <h1>Log in</h1>
                                <p>
                                    <label for="username" class="uname" data-icon="u" > Your email or username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p>
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" />
                                </p>
                                <p class="keeplogin">
                                    <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" />
                                    <label for="loginkeeping">Keep me logged in</label>
                                </p>
                                <?php if($_GET['oh']=='1'){?>
                                <label for="username" class="uname" data-icon="u" > Invalid username or password </label>
                                <?php }?>
                                <p class="login button">
                                    <input type="submit" value="Login" />
                                </p>
                                <p class="change_link">
                                   
                                    <a href="/?pag=home&allF" class="to_register">Just take a look</a>
                                    
                                </p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="../internal_part/serv/obr.php" method="get" >
                                <h1> Sign up </h1>
                                <p>
                                    <label for="usernamesignup" class="uname" data-icon="u">Your name</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername" />
                                </p>
                                <p>
                                    <label for="lastnamesignup" class="youmail" data-icon="e" > Your lastname</label>
                                    <input id="lastnamesignup" name="lastnamesignup" required="required" type="text" placeholder="mysuperlastname"/>
                                </p>
                                <p>
                                    <label for="loginsignup" class="uname" data-icon="u">Your login</label>
                                    <input id="loginsignup" name="loginsignup" required="required" type="text" placeholder="loginsignup" />
                                </p>
                                <p>
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p>
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                 <p>
                                    <label for="description" class="uname" data-icon="u">Your brief account description</label>
                                    <input id="description" name="description" required="required"  placeholder="I'm a photographer"/>
                                </p>
                                <p class="signin button">
                                    <input type="submit" value="Sign up"/>
                                </p>
                                <p class="change_link">
                                    Already a member ?
                                    <a href="#tologin" class="to_register"> Go and log in </a>
                                </p>
                            </form>
                        </div>

                    </div>
                </div>
            </section>

            <?php   }
            if($_GET['pag']=='home'){
                
            ?>

<article class="module width_3_quarter">
		<header><h3 class="tabs_involved">Content Manager</h3>
        <?php if(!isset($_SESSION['user'])){?>
        <a class="tabs_involved_c " href="/?pag=authorization"><h3 class="tabs_involved">Enter</h3></a>
        <?php }
        else{
        ?>
        <?php if(!isset($_GET['allF'])){?>
        <a class="tabs_involved_c " href="/?pag=home&allF"><h3 class="tabs_involved">All file</h3></a>
        <?php }
        else{
        ?>
        <a class="tabs_involved_c " href="/?pag=home"><h3 class="tabs_involved">Сontrol panel</h3></a>
         <?php }}?>
		</header>
        
		<div class="tab_container">
			<div id="tab1" class="tab_content" style="display: block;">
			<table class="tablesorter" cellspacing="0">  
            <?php if(!isset($_GET['sch'])){ ?>
			<thead> 
				<tr> 
                    <th class="header">Icon</th> 
   					<th class="header">Name</th> 
    				<th class="header">Сomments</th> 
    				<th class="header">General availability</th> 
    				<th class="header">Date upload</th> 
    				<?php if(isset($_SESSION['user'])){?> <th class="header">Actions</th> <?php } ?>
				</tr> 
			</thead> 
            <?php } ?>
			<tbody> 
                <?php 
                if(isset($_SESSION['user'])){
                    $_SESSION['user']->connection= $connection;
                    if(!isset($_GET['allF'])){
                
            
             if(isset($_GET['pg'])){

                $arr=$_SESSION['user']->getFiles($_GET['pg']);
             }
             else{
                $arr=$_SESSION['user']->getFiles(1);
             }
            }
            else{
                $arr = $_SESSION['user']->allFiles();
            }
            }
            else{
                $sours= new Prof;
                $sours->connection= $connection;
              
                if(isset($_GET['pg'])){

                    $arr=$sours->allFiles($_GET['pg']);
                 }
                 else{
                    $arr=$sours->allFiles(1);
                 }
            }
            if($arr!=null)
           
            if(!isset($_GET['sch'])){

            
             foreach(  $arr as &$cat){
               
                ?>
				<tr> 
                    
   					<td><img src="<?php if(substr($cat->file, -3)=="jpg"||substr($cat->file, -3)=="png"){echo("../vault/".$cat->file);} else{ if(substr($cat->file, -4)=="docx"||substr($cat->file, -3)=="doc"){echo("../images/dock.png");} else{ if(substr($cat->file, -3)=="rar"||substr($cat->file, -3)=="zip"){echo("../images/winrar.png");}else{ echo("../images/file.png");  }}}?>" alt="Avatar" class="avatar"></td>
    				<td><?php echo($cat->file);?></td> 
    				<td><?php echo($cat->comm);?></td> 
                    <td><input type="checkbox" disabled="disabled" <?php if($cat->statys==true){echo"checked";}?>></td> 
    				<td><?php echo($cat->date_up);?></td> 
    				<?php if(isset($_SESSION['user'])){?><td><a href="../internal_part/serv/obr.php/?sch=<?php echo($cat->id);?>"><input type="image" src="images/icn_edit.png" title="Edit"></a><a href="../internal_part/serv/obr.php/?dl=<?php echo($cat->id);?>"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> <?php } ?>
				</tr> 
                <?php }}
                else{
                    $arr=$_SESSION['user']->findFile($_GET['sch']);

                }
                ?>
                <tr> 
                        <td colspan="6">
                         <form  align ="right"  action="../internal_part/serv/obr.php<?php if(isset($_GET['sch'])){echo("/?fsch=".$_GET['sch']);} ?>" method="post"  enctype="multipart/form-data">
                        <input type="file" id="file" name="file">
                        <input id="Comm" name="Comm" required="required" type="text" placeholder="Сomments" value="<?php if(isset($_GET['sch'])){echo($arr->comm);} ?>" />
                        <input type="checkbox" name="checkbox" value="1" <?php if(isset($_GET['sch'])){if($arr->statys==1){echo'checked="checked"';}} ?>  >
                        <input type="submit" name="submit" value="ADD">
                                               
                       </td>
                      
				</tr> 
                <tr> 
                        <td colspan="6">
                    <?php 
                    if(!isset($_SESSION['user'])){
                        $sours= new Prof;
                        $sours->id=-1;
                        $sours->connection= $connection;
                        
                    }
                    else{
                        $sours=$_SESSION['user'];
                    }
                    for($i=0;$i<$sours->Countstr($sours->id)/10;$i++){?>
   					<a class="pagination" <?php if($i+1==$_GET['pg']){echo'href="#"'; } else { if(!isset($_GET['allF'])){ echo 'href="/?pag=home&pg='.(string)($i+1).'"';}else{  echo 'href="/?pag=home&allF&pg='.(string)($i+1).'"' ;}}?>><?php echo $i+1?></a>
                       
                       <?php }?>
                       </td>
				</tr> 
			</tbody> 
			</table>
			</div>
			
		
			
		</div>
		
		</article>
<?php
        }?>


        </div>
    </body>
</html>
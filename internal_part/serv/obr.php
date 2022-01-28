<?php
require "../../internal_part/serv/config.php";
session_start();
if(isset( $_SESSION['user'])){
    $_SESSION['user']->connection= $connection;

}
else{
    $new_car = new Prof;
    $new_car->connection= $connection;
}

if(isset( $_GET['usernamesignup'])){
    $new_car->name =$_GET['usernamesignup']; 
    $new_car->lastname=$_GET['lastnamesignup'];
    $new_car->comments=$_GET['description'];
    $new_car->Creat($_GET['loginsignup'],$_GET['passwordsignup']);
    $_SESSION['user'] = $new_car;
    header('location: /?pag=home' );
}

if(isset( $_GET['username'])){
    
  
    $new_car->Chek($_GET['username'],$_GET['password']);
    if($ff==-1){
      
        header('location: /?pag=authorization&oh=1' );
        
        
        
    }
    else{
       

        
       
        $_SESSION['user'] = $new_car;
        
        header('location: /?pag=home' );

    }
    
}

if(isset($_POST['Comm'])&& !isset($_GET['fsch'])){
       
    $file = new Files;
    $file->autor= $_SESSION['user']->id;
    if($_POST['checkbox']==NULL){
        $file->statys=0;
    }
    else{ $file->statys = $_POST['checkbox'];}

    $file->file= $_FILES['file']['name'];
    $file->comm = $_POST['Comm'];
    $file->date_add = date("Y-m-d H:i:s");
    $file->date_up = date("Y-m-d H:i:s");


    $_SESSION['user']->addFile($file);

    move_uploaded_file($_FILES['file']['tmp_name'], "../../vault/".$_FILES['file']['name']);
    
    header('location: /?pag=home' );
}

if(isset($_GET['dl'])){
    $file = new Files;
    $file->id = $_GET['dl'];
    $_SESSION['user']->changeFile($file,1);
    header('location: /?pag=home' );
}

if(isset($_GET['sch'])){
   
    header('location: /?pag=home&sch='.$_GET['sch']);

}
if(isset($_GET['fsch'])){
   
    $file = new Files;
    $arr=$_SESSION['user']->findFile($_GET['fsch']);
    $arr->autor= $_SESSION['user']->id;
    if($_POST['checkbox']==NULL){
        $file->statys=0;
    }
    else{ $arr->statys = $_POST['checkbox'];}
    $arr->comm = $_POST['Comm'];
    $arr->date_up = date("Y-m-d H:i:s");
    if(isset($_FILES['file'])&&$_FILES['file']['name']!=""){
        $arr->file=  $_FILES['file']['name'];
       
        move_uploaded_file($_FILES['file']['tmp_name'], "../../vault/".$_FILES['file']['name']);
    }
  
  
    
    $_SESSION['user']->changeFile($arr,0);;
    header('location: /?pag=home');

}
if(isset($_GET['chuser'])){


    $_SESSION['user']->name=$_POST['name'];
    $_SESSION['user']->lastname=$_POST['last'];
    $_SESSION['user']->comments=$_POST['comm'];

    $_SESSION['user']-> changeInfo($_SESSION['user']);
    header('location: /?pag=home');
}

if(isset( $_GET['exit'])){

    session_unset();
    session_destroy();
    header('location: /?pag=authorization' );
}



// $login = filter_var(trim(),FILTER_SANITIZE_STRING);
// $date = date("Y-m-d H:i:s");
// setcookie("idpu", $cat['id'], time()+3600,"/");   
// setcookie("nik", $cat['nickname'], time()+3600,"/");   
// header('location: /' );
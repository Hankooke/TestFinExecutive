<?php

class Files {
public $id;
public $autor;
public $statys;
public $file;
public $comm;
public $date_add;
public $date_up;

}
class Prof {
    public $id=-1;
    public $name;
    public $lastname;
    public $comments;
    public $avatar;
    public $connection;
    function getFiles($kol) {
        if($this->id!=-1){
        $pk = ($kol-1)*10+10;
        $zk = ($kol-1)*10;
        $sql1 = " SELECT * FROM `files` WHERE autor = '$this->id' ORDER BY id DESC LIMIT $pk OFFSET $zk";
        $articless = mysqli_query($this->connection, $sql1);
        if( mysqli_num_rows($articless) != 0 )
            {
                $stekback = array();
                $tik=0;
               while( $cat = mysqli_fetch_assoc($articless))
               {   $tekn="f".(string)$tik;
                   $$tekn = new Files;
                   $$tekn->id = $cat['id'];
                   $$tekn->autor = $cat['autor'];
                   $$tekn->statys = $cat['open'];
                   $$tekn->file = $cat['file'];
                   $$tekn->comm = $cat['comments'];
                   $$tekn->date_add = $cat['date_add'];
                   $$tekn->date_up = $cat['date_up'];
                    array_push($stekback, $$tekn);
                    $tik++;
               }
            
                return $stekback;
            } 
        }
               
    }
    function changeFile($file,$del){
        if($this->id!=-1){
        if($del==1){
            $articless = mysqli_query($this->connection, "DELETE FROM `files` WHERE id ='$file->id'");
        }
        else{
           
            $articless = mysqli_query($this->connection, "UPDATE `files` SET `open` = '$file->statys', `file` = '$file->file', `comments` = '$file->comm',  `date_up` = '$file->date_up' WHERE `files`.`id` = '$file->id'");
        }
         }

    }
    function findFile($id){
        $sql1 = " SELECT * FROM `files` WHERE id = '$id'";
        $articless = mysqli_query($this->connection, $sql1);
        $cat = mysqli_fetch_assoc($articless);
        $tekn = new Files;
        $tekn->id = $cat['id'];
        $tekn->autor = $cat['autor'];
        $tekn->statys = $cat['open'];
        $tekn->file = $cat['file'];
        $tekn->comm = $cat['comments'];
        $tekn->date_add = $cat['date_add'];
        $tekn->date_up = $cat['date_up'];
        return $tekn;
    }
    function allFiles($kol){
        $pk = ($kol-1)*10+10;
        $zk = ($kol-1)*10;
        $sql1 = " SELECT * FROM `files` WHERE open = 1  ORDER BY id DESC LIMIT $pk OFFSET $zk";
        $articless = mysqli_query($this->connection, $sql1);
        if( mysqli_num_rows($articless) != 0 )
            {
                $stekback = array();
                $tik=0;
               while( $cat = mysqli_fetch_assoc($articless))
               {   
                $tekn="f".(string)$tik;
                $$tekn = new Files;
                $$tekn->id = $cat['id'];
                $$tekn->autor = $cat['autor'];
                $$tekn->statys = $cat['open'];
                $$tekn->file = $cat['file'];
                $$tekn->comm = $cat['comments'];
                $$tekn->date_add = $cat['date_add'];
                $$tekn->date_up = $cat['date_up'];
                 array_push($stekback, $$tekn);
                 $tik++;
               }
                return $stekback;
            } 
    }
    function addFile($file){
        $sql1 = " INSERT INTO `files` (`id`, `autor`, `open`, `file`, `comments`, `date_add`, `date_up`) VALUES (NULL, '$this->id', '$file->statys', '$file->file', '$file->comm', '$file->date_add', '$file->date_add')";
        $articless = mysqli_query($this->connection, $sql1);
       
    }
    function Creat($login,$password){
        $sql1 = " INSERT INTO `user` (`id`, `name`, `lastname`, `lg`, `pw`, `comments`, `avatar`) VALUES (NULL, '$this->name', '$this->lastname', '$login', '$password', '$this->comments', NULL)";
        $articless = mysqli_query($this->connection, $sql1);
    }
    function Chek($login,$password){
      
        $sql1 = "  SELECT * FROM `user` WHERE lg ='$login' AND pw ='$password'";
        $articless = mysqli_query($this->connection, $sql1);
        if( mysqli_num_rows($articless) != 0 )
            {
                $cat = mysqli_fetch_assoc($articless);
                $this->id=$cat['id'];
                $this->name=$cat['name'];
                $this->lastname=$cat['lastname'];
                $this->comments=$cat['comments'];
                $this->avatar=$cat['avatar'];
                $this->connection=$this->connection;
                
            }
        else{
            return -1;
        }
    }
    function Countstr($id){
        if($id!=-1){
            $sql1 = "  SELECT COUNT(*) FROM `files` WHERE autor = '$id'";
        
            $articless = mysqli_query($this->connection, $sql1);
            
           return mysqli_fetch_assoc($articless)['COUNT(*)'];
        }
        else{
            $sql1 = "  SELECT COUNT(*) FROM `files` ";
            $articless = mysqli_query($this->connection, $sql1);
           return mysqli_fetch_assoc($articless)['COUNT(*)'];
        }

    }
    function changeInfo($newinfo){
        $sql1 =  "UPDATE `user` SET `name` = '$newinfo->name', `lastname` = '$newinfo->lastname', `comments` = '$newinfo->comments'  WHERE `user`.`id` = $newinfo->id";
        $articless = mysqli_query($this->connection, $sql1);
        
    }
}


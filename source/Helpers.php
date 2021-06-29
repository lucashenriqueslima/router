<?php

function site(string $param = null): string
    {
        if($param && !empty(SITE[$param])){
            return SITE[$param];
        }

        return SITE["root"];
    }

    function asset(string $path, $time = true): string
    {
        return SITE['root']."/views/assets/{$path}";
        
/*
        if($time && file_exists($fileOnDir)){
            $file .="?time=".filemtime($fileOnDir);
        }
         
        return $file;
        */
    }

    function setFlash($type, $msg){

        if($type == 1){
            $_SESSION["success"] = $msg;
        }

        if($type == 2){
            $_SESSION["error"] = $msg;
        }
       
    }
    function flash(string $type = null, string $message = null): ?string
    {
        if($type && $message){
            $_SESSION["flash"] = [
                "type"=> $type,
                "message"=> $message
            ];
            
            return null;
        }

        if(!empty($_SESSION["flash"])){
            
            echo "<script>const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })

              Toast.fire({
                icon: '".$_SESSION['flash']['type']."',
                title: '".$_SESSION['flash']['message']."'
              })</script>";

            unset($_SESSION['flash']);
        }

        return null;
    }
            


        
    

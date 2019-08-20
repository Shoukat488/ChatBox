<?php
        session_start();
        $dataForMe = isset($_POST['dataForMe'])?$_POST['dataForMe']:"";
        $dataForYou = isset($_POST['dataForYou'])?$_POST['dataForYou']:"";
        $user = $_SESSION['username'];

        echo $dataForMe;
        echo $dataForYou;
        echo $user;
        $userFile = fopen($user.".json",'a');
        $ali = fopen('ali.json','a');
        
        $string =  fread($userFile,filesize($user.".json"));

        echo $string;
        // if($user == 'shoukatali')
        // {
        //     fputs($shoukat,$dataForMe);
        //     fputs($ali,$dataForYou);
        // }
        // else{
        //     fputs($ali,$dataForMe);
        //     fputs($shoukat,$dataForYou);
        // }

        // fclose($ali);
        // fclose($shoukat);
?>
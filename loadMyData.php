<?php
        session_start();
        $dataForMe = isset($_POST['dataForMe'])?$_POST['dataForMe']:"";
        $dataForYou = isset($_POST['dataForYou'])?$_POST['dataForYou']:"";
        $user = $_SESSION['username'];

        echo $dataForMe;
        echo $dataForYou;
        echo $user;
        $ali = fopen('ali.txt','a');
        $shoukat = fopen('shoukatali.txt','a');

        if($user == 'shoukatali')
        {
            fputs($shoukat,$dataForMe);
            fputs($ali,$dataForYou);
        }
        else{
            fputs($ali,$dataForMe);
            fputs($shoukat,$dataForYou);
        }

        fclose($ali);
        fclose($shoukat);
?>
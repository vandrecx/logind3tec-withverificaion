<?php
    session_start();
    include_once("conexao.php");

    if((isset($_POST['email'])) && (isset($_POST['senha']))){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
   
        $sql = "SELECT * FROM user WHERE email = '$email' && senha = '$senha' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $resultado = mysqli_fetch_assoc($result);

        if(empty($resultado)){
        header("Location: index.php");
        }elseif(!empty($resultado)){
        $_SESSION['usuarioId'] = $resultado['id'];
        header("Location: admin.php");
        }
    }
    else{
        header("Location: index.php");
    }
?>
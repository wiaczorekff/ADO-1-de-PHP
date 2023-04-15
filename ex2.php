<?php
    
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");

    
    date_default_timezone_set("America/Sao_Paulo");
    $hoje = (new DateTimeImmutable("now"))->setTime(0, 0, 0, 0);




$nome	= isset($_POST['nome']) ? trim($_POST['nome']) : "";
$data_nascimento = isset($_POST['data-nascimento']) ? $_POST['data-nascimento'] : "";
$sexo	= isset($_POST['sexo']) ? $_POST['sexo'] : "";

$mensagem;


if (empty($nome)) {
  $mensagem = "Errado";
} else {
  
  if ($sexo != "M" && $sexo != "F") {
    $mensagem = "Errado";
  } else {
    
    $data_nascimento_obj = DateTime::createFromFormat("Y-m-d", $data_nascimento);
    if (!$data_nascimento_obj || $data_nascimento != $data_nascimento_obj->format("Y-m-d")) {
      $mensagem = "Errado";
    } else {
      
      if ($data_nascimento_obj > $hoje) {
        $mensagem = "Errado";
      } else {
        
        $idade = $hoje->diff($data_nascimento_obj)->y;
        if ($idade > 120) {
          $mensagem = "Errado";
        } else {
          
          $genero = ($sexo == "M") ? "um garoto" : "uma garota";
          $mensagem = "{$nome} é {$genero} de {$idade} anos de idade.";
        }
      }
    }
  }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exercício 2 </title>
    </head>
    <body>
        <p><?=$mensagem?></p>
    </body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Validação e formatação de telefone</title>
</head>
<body>
    <?php
    
    if (!isset($_GET['telefone'])) {
        echo "<p>Número inválido</p>";
    } else {
        
        $telefone = preg_replace('/[^0-9]/', '', $_GET['telefone']);

        
        if (strlen($telefone) == 10 || strlen($telefone) == 11) {
            
            $ddd = substr($telefone, 0, 2);

            
            $dddsValidos = array("11", "12", "13", "14", "15", "16", "17", "18", "19", "21", "22", "24", "27", "28", "31", "32", "33", "34", "35", "37", "38", "41", "42", "43", "44", "45", "46", "47", "48", "49", "51", "53", "54", "55", "61", "62", "63", "64", "65", "66", "67", "68", "69", "71", "73", "74", "75", "77", "79", "81", "82", "83", "84", "85", "86", "87", "88", "89", "91", "92", "93", "94", "95", "96", "97", "98", "99");
            if (in_array($ddd, $dddsValidos)) {
              
                if (strlen($telefone) == 11 && substr($telefone, 2, 1) == "9" && substr($telefone, 2, 2) != "90") {
                  
                    $telefoneFormatado = "(" . $ddd . ") " . substr($telefone, 2, 5) . "-" . substr($telefone, 7);
                    echo "<p>" . $telefoneFormatado . "</p>";
                } else if (strlen($telefone) == 10 && substr($telefone, 2, 1) >= 2 && substr($telefone, 2, 1) <= 8) {
                  
                    $telefoneFormatado = "(" . $ddd . ") " . substr($telefone, 2, 4) . "-" . substr($telefone, 6);
                    echo "<p>" . $telefoneFormatado . "</p>";
                } else {
                    echo "<p>Número inválido</p>";
                }
            } else {
                echo "<p>Número inválido</p>";
            }
        } else {
            echo "<p>Número inválido</p>";
        }
    }
    ?>
</body>
</html>

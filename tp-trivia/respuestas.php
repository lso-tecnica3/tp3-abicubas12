<?php

$respuestas_correctas = [
    "1" => "Kurama",
    "2" => "Sasuke",
    "3" => "Kakashi",
    "4" => "Uchiha",
    "5" => "Shukaku",
    "6" => "Gaara",
    "7" => "Sharingan",
    "8" => "Hinata",
    "9" => "Sasuke",
    "10" => "Naruto",
    "11" => "Naruto,Sasuke,Sakura",
    "12" => "Naruto,Kakashi",
    "13" => "Kakashi,Naruto,Sakura",
    "14" => "Gaara,Shikamaru",
    "15" => "Hinata,Tsunade",
    "16" => "Hiruzen Sarutobi,Minato Namikaze",
    "17" => "Kage Bunshin,Ninjutsu",
    "18" => "No tiene hermana",
    "19" => "Minato Namikaze,Jiraiya",
    "20" => "Hashirama Senju,Tobirama Senju"
];

$puntos = 0;

foreach ($respuestas_correctas as $pregunta => $correcta) {
    if (
        $pregunta == "11" || $pregunta == "12" || $pregunta == "13" ||
        $pregunta == "14" || $pregunta == "15" || $pregunta == "16" ||
        $pregunta == "17" || $pregunta == "18" || $pregunta == "19" ||
        $pregunta == "20"
    ) {
        if (isset($_GET[$pregunta])) {
            $temporal = $_GET[$pregunta];
            $r1 = "";
            $contador = 0;
            foreach ($temporal as $valor) {
                if ($contador == 0) {
                    $r1 = $valor;
                } else {
                    $r1 = $r1 . "," . $valor;
                }
                $contador++;
            }

            if ($r1 === $correcta) {
                print '<div class="alert alert-success" role="alert">';
                print "Pregunta $pregunta: Correcta";
                print '</div>';
                $puntos += 10;
            } else {
                print '<div class="alert alert-danger" role="alert">';
                print "Pregunta $pregunta: Incorrecta. La respuesta correcta es $correcta";
                print '</div>';
            }
        } else {
            print '<div class="alert alert-warning" role="alert">';
            print "Pregunta $pregunta: No respondida";
            print '</div>';
        }
    } else {
        if (isset($_GET[$pregunta])) {
            $respuesta_usuario = $_GET[$pregunta];
            if ($respuesta_usuario === $correcta) {
                print '<div class="alert alert-success" role="alert">';
                print "Pregunta $pregunta: Correcta";
                print '</div>';
                $puntos += 10;
            } else {
                print '<div class="alert alert-danger" role="alert">';
                print "Pregunta $pregunta: Incorrecta. La respuesta correcta es $correcta";
                print '</div>';
            }
        } else {
            print '<div class="alert alert-warning" role="alert">';
            print "Pregunta $pregunta: No respondida";
            print '</div>';
        }
    }
}

print "<br><strong>Total de puntos: $puntos</strong><br>";

$total_preguntas = 20;
$puntos_por_pregunta = 10;
$total_puntos = $total_preguntas * $puntos_por_pregunta;
$porcentaje = ($puntos * 100) / $total_puntos;

print "<strong>Porcentaje: $porcentaje </strong>";
if ($porcentaje < 50) {
    print "<p><strong>Seguí participando</strong></p>";
    print '<img src="./sasuke.png" alt="Seguí participando" width="200">';
} elseif ($porcentaje >= 50 && $porcentaje < 75) {
    print "<p><strong>Bien</strong></p>";
    print '<img src="./sasuke-bien.png" alt="Bien" width="200">';
} elseif ($porcentaje >= 75 && $porcentaje < 100) {
    print "<p><strong>Muy bien</strong></p>";
    print '<img src="./naruto-muybien.png" alt="Muy bien" width="200">';
} elseif ($porcentaje == 100) {
    print "<p><strong>Excelente</strong></p>";
    print '<img src="./naruto.png" alt="Excelente" width="200">';
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>
</html>

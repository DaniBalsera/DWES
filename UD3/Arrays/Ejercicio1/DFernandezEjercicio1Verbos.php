<a href="/DWES/UD3/Arrays/Ejercicio1/conf/confDFernandez.php">
    <img class="iconoCarpeta" src="VolverAtras.png" style="width: 40px; height: auto; cursor: pointer; margin-right: 3000px">
</a>
<br><br>

<?php 
/**
 * 
 * @author Daniel Fernández Balsera
 * 
 * 
 */

// Recorremos un array con los verbos irregulares en ingles


$verbos = array(
    "be" => array(
        "Infinitive" => "be",
        "Past Simple" => "was/were",
        "Past Participle" => "been",
        "Traducción" => "ser/estar"
    ),

    "become" => array(
        "Infinitive" => "become",
        "Past Simple" => "became",
        "Past Participle" => "become",
        "Traducción" => "convertirse"
    ),
    "begin" => array(
        "Infinitive" => "begin",
        "Past Simple" => "began",
        "Past Participle" => "begun",
        "Traducción" => "empezar"
    ),
    "break" => array(
        "Infinitive" => "break",
        "Past Simple" => "broke",
        "Past Participle" => "broken",
        "Traducción" => "romper"
    ),
    "bring" => array(
        "Infinitive" => "bring",
        "Past Simple" => "brought",
        "Past Participle" => "brought",
        "Traducción" => "traer"
    ),
    "build" => array(
        "Infinitive" => "build",
        "Past Simple" => "built",
        "Past Participle" => "built",
        "Traducción" => "construir"
    ),
    "buy" => array(
        "Infinitive" => "buy",
        "Past Simple" => "bought",
        "Past Participle" => "bought",
        "Traducción" => "comprar"
    ),
    "catch" => array(
        "Infinitive" => "catch",
        "Past Simple" => "caught",
        "Past Participle" => "caught",
        "Traducción" => "atrapar"
    ),
    "choose" => array(
        "Infinitive" => "choose",
        "Past Simple" => "chose",
        "Past Participle" => "chosen",
        "Traducción" => "elegir"
    ),
    "come" => array(
        "Infinitive" => "come",
        "Past Simple" => "came",
        "Past Participle" => "come",
        "Traducción" => "venir"
    ),
    "do" => array(
        "Infinitive" => "do",
        "Past Simple" => "did",
        "Past Participle" => "done",
        "Traducción" => "hacer"
    ),
    "drink" => array(
        "Infinitive" => "drink",
        "Past Simple" => "drank",
        "Past Participle" => "drunk",
        "Traducción" => "beber"
    ),
    "drive" => array(
        "Infinitive" => "drive",
        "Past Simple" => "drove",
        "Past Participle" => "driven",
        "Traducción" => "conducir"
    ),
    "eat" => array(
        "Infinitive" => "eat",
        "Past Simple" => "ate",
        "Past Participle" => "eaten",
        "Traducción" => "comer"
    ),
    "fall" => array(
        "Infinitive" => "fall",
        "Past Simple" => "fell",
        "Past Participle" => "fallen",
        "Traducción" => "caer"
    ),
    "feel" => array(
        "Infinitive" => "feel",
        "Past Simple" => "felt",
        "Past Participle" => "felt",
        "Traducción" => "sentir"
    ),
    "find" => array(
        "Infinitive" => "find",
        "Past Simple" => "found",
        "Past Participle" => "found",
        "Traducción" => "encontrar"
    ),
    "forget" => array(
        "Infinitive" => "forget",
        "Past Simple" => "forgot",
        "Past Participle" => "forgotten",
        "Traducción" => "olvidar"
    ),
    "get" => array(
        "Infinitive" => "get",
        "Past Simple" => "got",
        "Past Participle" => "got/gotten",
        "Traducción" => "conseguir"
    ),
    "give" => array(
        "Infinitive" => "give",
        "Past Simple" => "gave",
        "Past Participle" => "given",
        "Traducción" => "dar"
    ),
    "go" => array(
        "Infinitive" => "go",
        "Past Simple" => "went",
        "Past Participle" => "gone",
        "Traducción" => "ir"
    ),
    "have" => array(
        "Infinitive" => "have",
        "Past Simple" => "had",
        "Past Participle" => "had",
        "Traducción" => "tener"
    ),
    "hear" => array(
        "Infinitive" => "hear",
        "Past Simple" => "heard",
        "Past Participle" => "heard",
        "Traducción" => "oír"
    ),
    "keep" => array(
        "Infinitive" => "keep",
        "Past Simple" => "kept",
        "Past Participle" => "kept",
        "Traducción" => "mantener"
    ),
    "know" => array(
        "Infinitive" => "know",
        "Past Simple" => "knew",
        "Past Participle" => "known",
        "Traducción" => "saber/conocer"
    ),
    "leave" => array(
        "Infinitive" => "leave",
        "Past Simple" => "left",
        "Past Participle" => "left",
        "Traducción" => "dejar"
    ),
    "make" => array(
        "Infinitive" => "make",
        "Past Simple" => "made",
        "Past Participle" => "made",
        "Traducción" => "hacer"
    ),
    "meet" => array(
        "Infinitive" => "meet",
        "Past Simple" => "met",
        "Past Participle" => "met",
        "Traducción" => "conocer/encontrarse"
    ),
    "pay" => array(
        "Infinitive" => "pay",
        "Past Simple" => "paid",
        "Past Participle" => "paid",
        "Traducción" => "pagar"
    ),
    "put" => array(
        "Infinitive" => "put",
        "Past Simple" => "put",
        "Past Participle" => "put",
        "Traducción" => "poner"
    ),
    "read" => array(
        "Infinitive" => "read",
        "Past Simple" => "read",
        "Past Participle" => "read",
        "Traducción" => "leer"
    ),
    "run" => array(
        "Infinitive" => "run",
        "Past Simple" => "ran",
        "Past Participle" => "run",
        "Traducción" => "correr"
    ),
    "say" => array(
        "Infinitive" => "say",
        "Past Simple" => "said",
        "Past Participle" => "said",
        "Traducción" => "decir"
    ),
    "see" => array(
        "Infinitive" => "see",
        "Past Simple" => "saw",
        "Past Participle" => "seen",
        "Traducción" => "ver"
    ),
    "sell" => array(
        "Infinitive" => "sell",
        "Past Simple" => "sold",
        "Past Participle" => "sold",
        "Traducción" => "vender"
    ),
    "send" => array(
        "Infinitive" => "send",
        "Past Simple" => "sent",
        "Past Participle" => "sent",
        "Traducción" => "enviar"
    ),
    "sit" => array(
        "Infinitive" => "sit",
        "Past Simple" => "sat",
        "Past Participle" => "sat",
        "Traducción" => "sentarse"
    ),
    "sleep" => array(
        "Infinitive" => "sleep",
        "Past Simple" => "slept",
        "Past Participle" => "slept",
        "Traducción" => "dormir"
    ),
    "speak" => array(
        "Infinitive" => "speak",
        "Past Simple" => "spoke",
        "Past Participle" => "spoken",
        "Traducción" => "hablar"
    ),
    "spend" => array(
        "Infinitive" => "spend",
        "Past Simple" => "spent",
        "Past Participle" => "spent",
        "Traducción" => "gastar"
    ),
    "stand" => array(
        "Infinitive" => "stand",
        "Past Simple" => "stood",
        "Past Participle" => "stood",
        "Traducción" => "estar de pie"
    ),
    "take" => array(
        "Infinitive" => "take",
        "Past Simple" => "took",
        "Past Participle" => "taken",
        "Traducción" => "tomar"
    ),
    "teach" => array(
        "Infinitive" => "teach",
        "Past Simple" => "taught",
        "Past Participle" => "taught",
        "Traducción" => "enseñar"
    ),
    "tell" => array(
        "Infinitive" => "tell",
        "Past Simple" => "told",
        "Past Participle" => "told",
        "Traducción" => "decir/contar"
    ),
    "think" => array(
        "Infinitive" => "think",
        "Past Simple" => "thought",
        "Past Participle" => "thought",
        "Traducción" => "pensar"
    ),
    "understand" => array(
        "Infinitive" => "understand",
        "Past Simple" => "understood",
        "Past Participle" => "understood",
        "Traducción" => "entender"
    ),
    "wear" => array(
        "Infinitive" => "wear",
        "Past Simple" => "wore",
        "Past Participle" => "worn",
        "Traducción" => "llevar puesto"
    ),
    "win" => array(
        "Infinitive" => "win",
        "Past Simple" => "won",
        "Past Participle" => "won",
        "Traducción" => "ganar"
    ),
    "write" => array(
        "Infinitive" => "write",
        "Past Simple" => "wrote",
        "Past Participle" => "written",
        "Traducción" => "escribir"
    )
);





// Bucle foreach para recorrer el array
echo "<table border='1' style='width: 100%; border-collapse: collapse;'>";
echo "<tr><th colspan='4' style='background-color: grey; color: white'>VERBOS IRREGULARES EN INGLÉS</th></tr>";
echo "<th>Infinitive</th><th>Past Simple</th><th>Past Participle</th><th>Traducción</th>";
foreach($verbos as $tipo){

    echo "<tr>";
    echo "<td style='text-align: center;'>{$tipo['Infinitive']}</td>";
    echo "<td style='text-align: center;'>{$tipo['Past Simple']}</td>";
    echo "<td style='text-align: center;'>{$tipo['Past Participle']}</td>";
    echo "<td style='text-align: center;'>{$tipo['Traducción']}</td>";
    echo "</tr>";
}

?>
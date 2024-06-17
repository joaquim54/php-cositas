<?php

const API_URL = "https://www.whenisthenextmcufilm.com/api";
#incializar una nueva sesión de curl; ch = curl handle
$ch = curl_init(API_URL);
//indicar que queremos el resultado de la petición y no mostrarlo en pnatalla

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/*ejecutar la petición y guardamos el resultado de la petición y no mostrar en pnatalla*/
$resultado = curl_exec($ch);
$data = json_decode($resultado, true);
curl_close($ch);

// var_dump($data);

?>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>
        La Próxima película de Marvel    </title>
</head>

<main>
    <section>
        <img src="<?= $data["poster_url"];?>" width="200" alt="poster de <?= $data["title"];?> "/>
    </section>

    <hgroup>
        <h3><?=$data["title"];?> Se estrena en <?=$data["days_until"];?> días</h3>
        <p>Fecha de estreno<?=$data["release_date"];?></p>
        <p>La siguiente película en estrenarse es <?=$data["following_production"]["title"];?></p>
    </hgroup>
</main>



<style type="text/css">
    :root{
        color-scheme: light dark;
    }

    body{
        display: grid;
        place-content: center;
    }
    img{
        margin: 0 auto;

    }
    section{
        display: flex;
        justify-content: center;
     
    }
    hgroup{
        display: flex;
        flex-direction: columns;
        justify-content: center;
        
    }
</style>
<?php
 const API_URL = "https://whenisthenextmcufilm.com/api";
#Iniciamos el CURL; CH= cURL Handle
$ch = curl_init(API_URL);
//Esto es para atrapar el resultado de la petición y no se muestre en pantalla,con ella poder manejarla.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
# Ejecutamos la petición y la guardamos en "result"

/*  Si quisieramos tambien podemos usar file_get_contents EN CASO DE SOLO QUERER HACER UN GET
    $result = file_get_contents(API_URL);

*/
$result  = curl_exec($ch);
$data = json_decode($result, true);

curl_close($ch);
?>

<head>
    <meta charset="UTF-8" />
    <title>Próxima película de Marvel</title>
    <meta name="description" content="La próxima película de Marvel"/>
    <meta name="viewport" content="width=devide-width, initial-scale=1.0"/>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    >
</head>

<main>
    <!-- <pre style="font-size: 10px; overflow: scroll; height: 250px; ">
     <?php var_dump($data); ?>
    </pre> -->
  
    <center><h1>LA PRÓXIMA PELICULA QUE SE ESTRENARÁ</h1></center>
    <section>
        <!-- <center> -->
            <img class="hover" src="<?= $data["poster_url"]; ?>" width="350" alt="Poster de <?= $data["title"]; ?>" 
            style= "border-radius:  16px"
            />
        <!-- </center>  -->
        </section>
    
    <hgroup>
        <h3 > <?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> días  </h2>
        <p>Fecha de estreno: <?= $data["release_date"]?></p>
        <br>
        <P>La siguiente pelicula es:</P>
        <p><b><?= $data["following_production"]["title"]?></b></p>
        <img class="hover" src="<?= $data["following_production"]["poster_url"]; ?>" width="200" alt="Poster de <?= $data["title"]; ?>" 
            style= "border-radius:  16px"
            />
        <p>Fecha de estreno: <?= $data["following_production"]["release_date"]?></p>
    </hgroup>


<p>by: MonsieurChat</p>
</main>


<style>
:root {
    color-scheme: light dark;
}

body{
    display:block;
    /* flex-direction: column; */
    /* place-content: center; */
}

h1{
    place-content: center;
}

section{
    display: flex;
    justify-content: center;
    text-align: center;
}

img{
    margin: 10px auto;
}
.hover {
            transition: filter 0.3s ease;
        }

.hover:hover {
            filter: drop-shadow(0 0 8px rgb(0, 0, 100));
        }

hgroup{
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
}
</style>
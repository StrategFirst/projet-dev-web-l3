<h1> lecture des rencontres (table matchs)</h1>

<table>
    <tr>
        <th>COMPETITION</th>
        <th>EQUIPE</th>
        <th>EQUIPE ADVERSE</th>
        <th>DATE</th>
        <th>HEURE</th>
        <th>TERRAIN</th>
        <th>SITE</th>
    </tr>

<?php

function td($data)
{
    echo "<td> $data </td>";
} 

foreach($matchs as $match)
    {
        echo"<tr>";

        td($match['competition']);
        td($match['equipe_locale']);
        td($match['equipe_adverse']);

        $date_et_heure = preg_split("/[\s]+/", $match['date']);
        td($date_et_heure[0]);
        td($date_et_heure[1]);
        td($match['terrain']);
        td($match['lieu']);

        
        echo"<tr>";
        
        
    }

    ?>

    </table>
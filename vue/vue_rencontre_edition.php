<script src="./vue/script/update_delete.js" defer></script>

<h1>Edition des rencontres (table matchs)</h1>

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

$enum_competition=array('amical'=>"amical",'coupe de france'=>"coupe de france",'coupe de l anjou'=>"coupe de l anjou",
'coupe des pays de la loire'=>"coupe des pays de la loire",'coupe des reserves'=>"coupe des reserves",'d1-groupe A'=>"d1-groupe A",
'd4-groupe E'=>"d4-groupe E",'d5-groupe A'=>"d5-groupe A");

$enum_equipe=array('SENIOR_A'=>"SENIOR_A",'SENIOR_B'=>"SENIOR_B",'SENIOR_C'=>"SENIOR_C");


function td_select($name="",$data,$options=null)
{

    echo "<td><select name=$name><option value=\"$data\">$data</option>";
    //afficher toutes les options possibles
    if($options!=null)
    {
        foreach($options as $key=>$opt)
        {   if($opt!=$data)
            {
               echo "<option value=\"$opt\">$opt</option>";
            }
        }
    }
        echo"</select></td>";

}

function td_date($data)
{
    echo "<td><input type=\"date\" name=\"jour\" value=\"$data\"></td>";
}

function td_time($data)
{
    $time=substr($data,0,-3);
    echo "<td><input type=\"time\" name=\"heure\" value=\"$time\"></td>";
}

function td($data)
{
    echo "<td> $data </td>";
}

function td_text($name,$data)
{

    echo "<td><input type=\"text\" name=$name value=\"$data\"></td>";
}


foreach($matchs as $match )
    {
        $id=$match['id'];
        echo"<tr id=\"m$id\">";

        td_select('competition',$match['competition'],$enum_competition);
        td_select('equipe_locale',$match['equipe_locale'],$enum_equipe);
        td_text('equipe_adverse',$match['equipe_adverse']); // a changer en input text

        $date_et_heure = preg_split("/[\s]+/", $match['date']);
        td_date($date_et_heure[0]);
        td_time($date_et_heure[1]);
        td_text('terrain',$match['terrain']);// a changer en input text
        td_text('lieu',$match['lieu']);// a changer en input text

        td("<button class=\"updateButton\">modifier</button>");

        td("<button class=\"deleteButton\">supprimer</button>");
        echo"</tr>";


    }


    ?>

    </table>

    <div id="ajout">

    <br><br>



        <form action="api/ajout_matchs.php" method="post">

        <table>
            <tr>
                <th>Competition</th> <!-- enum -->

                <th>Equipe Locale </th><!-- enum -->

                <th>Equipe adverse</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Terrain</th>
                <th>Lieu</th>

             </tr>

            <tr>
                <td>
                    <select id="competition" name ="competition" required>
                    <option value=""></option>
                    <?php
                        foreach($enum_competition as $key=>$val)
                        {


                            echo "<option value=\"$val\">$val</option>";
                        }
                    ?>
                    </select>
                </td>

                <td>
                    <select id="equipe_locale" name="equipe_locale" required>
                    <option value=""></option>
                    <?php
                        foreach($enum_equipe as $key=>$val)
                        {
                            echo "<option value=$val>$val</option>";
                        }
                    ?>

                </td>

                <td><input type="text" id="equipe_adverse" name="equipe_adverse" required></td>

                <td><input type="date" id="date" name="date" required></td>

                <td><input type="time" id="heure" name="heure" required></td>

                <td><input type="text" id="terrain" name="terrain" required></td>

                <td><input type="text" id="lieu" name="lieu" required></td>

                <td><input type="submit" name="ajout" value="Ajouter"></td>

            </tr>

        </form>

    </div>

    <div id="InsertionCSV">
      <h6> Insertion par fichier CSV </h6>
      <form enctype="multipart/form-data" method="POST" action="/?action=rencontrescsv&mode=edition">
        <input type="file" name="sourceCSV" accept="text/csv"/>
        <input type="submit" value="envoyer"/>
      </form>
    </div>
    <h6> Insertion par formulaire </h6>

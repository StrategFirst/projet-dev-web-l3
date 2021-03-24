<script src=./vue/update_delete.js defer></script>

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


function td_select($name="",$data,$options=null)
{
    $value=preg_replace("/\s+/","*",$data);
    echo "<td><select name=$name><option value='$value'>$data</option>";
    //afficher toutes les options possibles
    if($options!=null)
    {
        
        foreach($options as $opt)
        {   if($opt[$name]!=$data) 
            { 
               $value=preg_replace("/\s+/","*",$opt[$name]);

            echo "<option value='$value'>$opt[$name]</option>";
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



foreach($matchs as $match )
    {
        $id=$match['id'];
        echo"<tr id=\"m$id\">";
        
        td_select('competition',$match['competition'],$competition); 
        td_select('equipe_locale',$match['equipe_locale'],$equipe_locale); 
        td_select('equipe_adverse',$match['equipe_adverse'],$equipe_adverse);

        $date_et_heure = preg_split("/[\s]+/", $match['date']);
        td_date($date_et_heure[0]);
        td_time($date_et_heure[1]);
        td_select('terrain',$match['terrain'],$terrain);
        td_select('lieu',$match['lieu'],$lieu);

        td("<button class=\"updateButton\">modifier</button>");
        
        td("<button class=\"deleteButton\">supprimer</button>");
        echo"</tr>";
        
        
    }


    ?>

    </table>
<?php 
// a remplacer par la recup des enums dans mysql
$enum_competition=array('amical'=>"amical",'coupe de france'=>"coupe de france",'coupe de l anjou'=>"coupe de l anjou",
'coupe des pays de la loire'=>"coupe des pays de la loire",'coupe des reserves'=>"coupe des reserves",'d1-groupe A'=>"d1-groupe A",
'd4-groupe E'=>"d4-groupe E",'d5-groupe A'=>"d5-groupe A");

$enum_equipe=array('SENIOR_A'=>"SENIOR_A",'SENIOR_B'=>"SENIOR_B",'SENIOR_C'=>"SENIOR_C");

?>    
    <div id="ajout">

    <br><br>


        <script defer>
            let Addrow =function()
            {
                
                //je sais pas comment faire pour envoyer des données par post au fichier updtae match.php

            };
        </script>

        <form action="controlleur/ajout_matchs.php" method="post">
        
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
                            $value=preg_replace("/\s+/","*",$val);
                            
                            echo "<option value=$value>$val</option>";
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


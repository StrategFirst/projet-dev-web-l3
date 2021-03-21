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
    echo "<td><select name=$name><option>$data</option>";
    //afficher toutes les options possibles
    if($options!=null)
    {
        
        foreach($options as $opt)
        {    
            echo "<option>$opt[$name]</option>";
        }
    }   
        echo"</select></td>";
   
}    
function td($data)
{
    echo "<td> $data </td>";
} 

foreach($matchs as $match )
    {
        echo"<tr>";

        td_select('competition',$match['competition'],$competition);
        td_select('equipe_locale',$match['equipe_locale'],$equipe_locale);
        td_select('equipe_adverse',$match['equipe_adverse'],$equipe_adverse);

        $date_et_heure = preg_split("/[\s]+/", $match['date']);
        td($date_et_heure[0]);
        td($date_et_heure[1]);
        td_select('terrain',$match['terrain'],$terrain);
        td_select('lieu',$match['lieu'],$lieu);

        
        echo"</tr>";
        
        
    }

    ?>

    </table>
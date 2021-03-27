<script src="./vue/absence.js" defer></script>
<h1>gestion des absences</h1>


<table id="absences">
    <tr id="dates">
        <th id="code"> Code : A(bsent), B(lessé), N(on-licencié), S(uspendu)</th>
    <?php

        $dates_annee=array("02/8","09/8","16/8","23/8","30/8","06/9","13/9","20/9","20/9","04/10","11/10","18/10","25/10","01/11","08/11","15/11","22/11",
        "29/11","06/12","13/12","20/12","27/12","03/1","10/1","17/1","24/1","31/1","07/2","14/2","21/2","28/2","07/3","14/3","21/3","28/3","04/4","11/4",
        "18/4","25/4","02/5","09/5","16/5","23/5","30/5","06/6","13/6","20/6","27/6","04/7","11/7","18/7","25/7","01/8");

       
        foreach($dates_annee as $val)
        {
            echo "<th>$val</th>";
        }    

        echo " </tr>";

        function option_etat($etat,$selected=null)
        {
            if(isset($selected) && $selected==0)
            {
                echo "<option value=\"$etat\" selected>$etat</option>";
            }
            else 
                {
                 echo "<option value=\"$etat\">$etat</option>";
                }
        }
        function option_etat_spé($selected=null)
        {
            if($selected==1)
            {
                echo "<option value=\"null\" selected></option>";
            }
            else 
            {
                echo "<option value=\"null\" ></option>";
            }
        }

        foreach($joueurs as $joueur)
        {
            $prenom=$joueur['prenom'];
            $nom= $joueur['nom'];
            $id=$joueur['id'];
            echo "<tr><td id=\"$id\">$prenom $nom </td>";
            //faire pour toutes les dates les select
            foreach($dates_annee as $osef)
            {

                echo"<td><select name=\"etat\" onchange=\"udpate(event)\">";
                option_etat("A");
                option_etat("B");
                option_etat("N",$joueur['license']);
                option_etat("S");
                option_etat_spé($joueur['license']);
                echo "</select></td>";
            } 
            echo "</tr>";
            
        


        }
    ?>

    
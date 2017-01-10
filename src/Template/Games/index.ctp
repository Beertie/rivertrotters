<table>
    <thead>
    <tr>
        <th>Time</th>
        <th>Home</th>
        <th>Away</th>
        <th>Code</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php
        $last_time = time();
        //debug($last_time);
        foreach ($games->wedstrijden as $game){
            //debug($game);
            if($game->datum == null){
                $other_games[] = $game;
                continue;
            }

            $count_time = strtotime($game->datum) - $last_time;

            //Create line for weekend
            if($count_time > 432000){
                //Set number of week

                echo "<tr>";
                echo "<td></td>";
                echo "</tr>";
                $last_time = strtotime($game->datum);
                continue;
            }



            echo "<tr>";
            echo "<td>".$game->datum."</td>";
            echo "<td>".$game->thuis_ploeg."</td>";
            echo "<td>".$game->uit_ploeg."</td>";
            echo "<td>".$game->id."</td>";
            echo "</tr>";
            $last_time = strtotime($game->datum);
        }

        ?>
    </tr>
    </tbody>
</table>


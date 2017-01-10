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
        foreach ($games->wedstrijden as $game){
            //debug($game);
            if($game->datum == null){
                $other_games[] = $game;
                continue;
            }

            echo "<tr>";
            echo "<td>".$game->datum."</td>";
            echo "<td>".$game->thuis_ploeg."</td>";
            echo "<td>".$game->uit_ploeg."</td>";
            echo "<td>".$game->id."</td>";
            echo "</tr>";
        }

        ?>
    </tr>
    </tbody>
</table>


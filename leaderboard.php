<?php
include_once "db_api.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Fifteen- Leaderboard</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body class="bloom">
        <header>
            <h1>Leaderboard</h1>
            <button onclick="location.href='index.php';">Go to Game</button>
        </header>
        <main>
        <!--this leaderboard should be replaced with one that loads dynamically-->
        <div id="board-center">
            <table id="leaderboard">
                <tr>
                    <th>Name</th>
                    <th>Mode</th>
                    <th># Moves</th>
                    <th>Completion Time</th>
                    <th>Timestamp</th>
                </tr>
                <tr> <!--will be filled with info from database-->
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
        </main>
    </body>
</html>

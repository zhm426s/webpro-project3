<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Fifteen</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <header>
            <h1>Fifteen- Leaderboard</h1>
            <button onclick="location.href='leaderboard.php';">Go to Game</button>
        </header>
        <main>
        <!--this leaderboard should be replaced with one that loads dynamically-->
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
        </main>
    </body>
</html>
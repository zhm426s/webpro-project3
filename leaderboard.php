<?php
include_once "db_api.php";

// get the id for this user and end game
session_start();
$id = -1;
if (isset($_SESSION['this_game'])) {
    $id = $_SESSION['this_game'];
    unset($_SESSION['this_game']);
}
$scores = get_scores();

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
                <?php if (!empty($scores)): ?>
                    <?php foreach ($scores as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['mode']) ?></td>
                            <td><?= htmlspecialchars($row['moves']) ?></td>
                            <td><?= htmlspecialchars($row['time']) ?></td>
                            <td><?= htmlspecialchars($row['created_at']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No scores yet</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </main>
</body>

</html>
<?php


$host = "aguragai1";
$user = "aguragai1";
$pass = "";
$db   = "fifteen_puzzle";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/*
|--------------------------------------------------------------------------
| INSERT USER
|--------------------------------------------------------------------------
*/
function insert_user($name)
{
    global $conn;

    $stmt = $conn->prepare("INSERT INTO users (name) VALUES (?)");
    $stmt->bind_param("s", $name);
    $stmt->execute();

    return $stmt->insert_id;
}

/*
|--------------------------------------------------------------------------
| SAVE SCORE
|--------------------------------------------------------------------------
*/
function save_score($user_id, $mode, $moves, $time)
{
    global $conn;

    $stmt = $conn->prepare("
        INSERT INTO scores (user_id, mode, moves, time)
        VALUES (?, ?, ?, ?)
    ");

    $stmt->bind_param("isii", $user_id, $mode, $moves, $time);
    $stmt->execute();
}

/*
|--------------------------------------------------------------------------
| GET SCORES (LEADERBOARD)
|--------------------------------------------------------------------------
*/
function get_scores()
{
    global $conn;

    $sql = "
        SELECT u.name, s.mode, s.moves, s.time, s.created_at
        FROM scores s
        JOIN users u ON s.user_id = u.id
        ORDER BY s.moves ASC, s.time ASC
        LIMIT 20
    ";

    $result = $conn->query($sql);

    $scores = [];

    while ($row = $result->fetch_assoc()) {
        $scores[] = $row;
    }

    return $scores;
}

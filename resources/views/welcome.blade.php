<!-- resources/views/scoreboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Scoreboard</title>
</head>
<body>
    <h1>Live Scoreboard</h1>
    <p>Team A: <span id="teamA_score">0</span></p>
    <p>Team B: <span id="teamB_score">0</span></p>

    <form action="/update-score" method="POST" id="score-form">
        @csrf
        <label for="teamA_score_input">Team A Score:</label>
        <input type="number" id="teamA_score_input" name="teamA_score" value="0" min="0">
        
        <label for="teamB_score_input">Team B Score:</label>
        <input type="number" id="teamB_score_input" name="teamB_score" value="0" min="0">

        <button type="submit">Update Score</button>
    </form>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
<!-- resources/views/scoreboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Scoreboard</title>
</head>
<body>
    <h1>Live Scoreboard</h1>
    <p>Team A: <span id="teamA_score">0</span></p>
    <p>Team B: <span id="teamB_score">0</span></p>

    <form action="/update-score" method="POST" id="score-form">
        @csrf
        <label for="teamA_score_input">Team A Score:</label>
        <input type="number" id="teamA_score_input" name="teamA_score" value="0" min="0">
        
        <label for="teamB_score_input">Team B Score:</label>
        <input type="number" id="teamB_score_input" name="teamB_score" value="0" min="0">

        <button type="submit">Update Score</button>
    </form>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
<!-- resources/views/scoreboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Scoreboard</title>
</head>
<body>
    <h1>Live Scoreboard</h1>
    <p>Team A: <span id="teamA_score">0</span></p>
    <p>Team B: <span id="teamB_score">0</span></p>

    <form action="/update-score" method="POST" id="score-form">
        @csrf
        <label for="teamA_score_input">Team A Score:</label>
        <input type="number" id="teamA_score_input" name="teamA_score" value="0" min="0">
        
        <label for="teamB_score_input">Team B Score:</label>
        <input type="number" id="teamB_score_input" name="teamB_score" value="0" min="0">

        <button type="submit">Update Score</button>
    </form>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>

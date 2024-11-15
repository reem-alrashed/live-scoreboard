<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Scoreboard</title>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #8b53f1;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .scoreboard {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 600px;
        }

        .score {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .score span {
            font-size: 30px;
            color: #2196F3;
        }

        label {
            font-size: 16px;
            margin-right: 10px;
            color: #555;
        }

        input[type="number"] {
            padding: 5px 10px;
            margin: 10px 0;
            width: 60px;
            font-size: 16px;
            border: 2px solid #ccc;
            border-radius: 4px;
            transition: border 0.3s ease;
        }

        input[type="number"]:focus {
            border-color: #2196F3;
            outline: none;
        }

        button {
            padding: 10px 20px;
            background-color: #2196F3;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #1976D2;
        }

        .alert {
            margin-top: 20px;
            padding: 10px;
            background-color: #f44336;
            color: white;
            border-radius: 4px;
            display: none;
        }
    </style>
</head>

<body>
    <div class="scoreboard">
        <h1>Live Scoreboard</h1>
        <p class="score">Team A: <span id="teamA_score">0</span></p>
        <p class="score">Team B: <span id="teamB_score">0</span></p>

        <form id="score-form">
            @csrf
            <label for="teamA_score_input">Team A Score</label>
            <input type="number" id="teamA_score_input" name="teamA_score" value="0" min="0">
            <br />
            <label for="teamB_score_input">Team B Score</label>
            <input type="number" id="teamB_score_input" name="teamB_score" value="0" min="0">
            <br />
            <button type="submit">Update</button>
        </form>

        <div class="alert" id="error-message"></div>
    </div>

    <script>
        $(document).ready(function () {
            $('#score-form').submit(function (e) {
                e.preventDefault(); // Prevent default form submission

                // Get input values
                const teamA_score = $('#teamA_score_input').val();
                const teamB_score = $('#teamB_score_input').val();

                // Send AJAX request to update the scores
                $.ajax({
                    url: '/update-score', // The route for updating score
                    type: 'POST', // HTTP method
                    data: {
                        _token: $('input[name="_token"]').val(), // CSRF token
                        teamA_score,
                        teamB_score
                    },
                    success: function (response) {
                        // Update displayed scores upon successful response
                        $('#teamA_score').text(response.data.teamA_score);
                        $('#teamB_score').text(response.data.teamB_score);
                    },
                    error: function (xhr, status, error) {
                        // Display error message if request fails
                        $('#error-message').text(`Something went wrong: ${error}`).show();
                    }
                });
            });
        });
    </script>

</body>

</html>

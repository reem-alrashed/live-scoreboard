// resources/js/app.js

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

const echo = new Echo({
    broadcaster: 'pusher',
    key: '7af4f17fbc40fcb7daa8',
    cluster: 'ap2',
    forceTLS: true
});

// Listen for the score-updated event on the game-scoreboard channel
echo.channel('game-scoreboard')
    .listen('.score-updated', (event) => {
        // Update the UI with the latest scores
        document.getElementById('teamA_score').textContent = event.teamA_score;
        document.getElementById('teamB_score').textContent = event.teamB_score;
    });

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## About This App

This application is a **live scoreboard** built with Laravel and its powerful **Broadcasting** feature. It provides real-time updates to the scores of two teams as they are updated by the users. The application uses Laravel Echo and Pusher (or other broadcasting drivers) to handle real-time events, making the score updates instantly visible to all connected users.

Key features include:

- **Real-Time Score Updates**: As users submit score changes, all connected clients are immediately notified and the displayed scores are updated live.
- **User-Friendly Interface**: A simple and clean user interface to input the scores for two teams, with immediate feedback and validation.

## Technologies Used

- **Laravel Framework**: The backend of this app is powered by the [Laravel framework](https://laravel.com), known for its elegant syntax and powerful features like routing, Eloquent ORM, queues, and broadcasting.
- **Laravel Broadcasting**: Using Laravel's broadcasting feature, the app allows users to receive real-time score updates through WebSockets.
- **Pusher** (or any broadcasting driver): Pusher (or an alternative WebSocket service) is used to broadcast events to clients in real time.
- **jQuery**: To handle dynamic updates to the webpage without requiring a page reload.

For more information about Laravel's broadcasting feature, check out the official [broadcasting documentation](https://laravel.com/docs/broadcasting).

## Features

- **Real-Time Event Broadcasting**: Score changes are broadcast to all connected clients in real-time.
- **Score Update Form**: Users can input scores for both teams, and the updated scores will automatically reflect on all clients.
- **AJAX Submission**: The score form uses AJAX to submit the scores to the server without refreshing the page.
- **Error Handling**: If something goes wrong during the score update, an error message is displayed to the user.

## Setup Instructions

### Prerequisites

Make sure you have the following installed:

- PHP >= 8.0
- Composer
- Laravel 10.x
- Node.js & NPM (for compiling assets)
- A broadcasting service like Pusher or Redis

### Installation

1. **Clone the repository**:

   ```bash
   git clone https://github.com/yourusername/live-scoreboard.git
   cd live-scoreboard

2. **Run the following command to install Laravel dependencies:**:

```bash
composer install
```
3. **Set up your environment:**:


Copy the .env.example file to .env and configure the database and broadcasting settings.

```bash
cp .env.example .env
```
Update .env with your database connection details and broadcasting service configuration. For example, if you're using Pusher, add the following:

.env
```bash
BROADCAST_DRIVER=pusher
PUSHER_APP_ID=your-pusher-app-id
PUSHER_APP_KEY=your-pusher-app-key
PUSHER_APP_SECRET=your-pusher-app-secret
PUSHER_APP_CLUSTER=your-pusher-app-cluster
```
Generate the application key:

```bash
php artisan key:generate
```

Run the migrations:

```bash
php artisan migrate
```

Install NPM dependencies:

```bash
npm install
```
Compile assets:

```bash
npm run dev
```

Start the server:

```bash
php artisan serve
```


# Broadcasting Events
In this app, the events are broadcast using the Broadcast facade in Laravel. When a user updates the score, an event is triggered that broadcasts the new score to all connected clients.

## How It Works
The core feature of this app is real-time score broadcasting. When a user updates the score for either Team A or Team B, an event is broadcast to all connected clients. This is powered by Laravel's Broadcasting system and Laravel Echo on the frontend.

### Controller: Broadcasting Score Updates
The GameController is responsible for handling the score updates. When the user submits the updated scores, the controller validates the input and then triggers a broadcast event to notify all connected clients of the score change.

Here’s how the updateScore method works:
```php
public function updateScore(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'teamA_score' => 'required|integer',
        'teamB_score' => 'required|integer',
    ]);

    // Broadcast the score update event
    broadcast(new ScoreUpdated($request->teamA_score, $request->teamB_score));

    // Return a response (optional)
    return response()->json([
        'message' => 'Score updated successfully',
        'teamA_score' => $request->teamA_score,
        'teamB_score' => $request->teamB_score,
    ]);
}
```

### Broadcasting with Pusher (or another WebSocket service)
If you are using Pusher or another WebSocket service, ensure that:

1. You have a valid Pusher account and have configured your .env file with the correct credentials (as shown above).

2. You have installed the Laravel Echo and Pusher packages by running:
```bash
composer require pusher/pusher-php-server
npm install --save laravel-echo pusher-js
```
3. You have set up your frontend to listen for broadcast events and update the UI in real time. For example, the ScoreUpdated event could be broadcast as follows:
```js
Echo.channel('game')
    .listen('ScoreUpdated', (event) => {
        document.getElementById('teamA_score').textContent = event.teamA_score;
        document.getElementById('teamB_score').textContent = event.teamB_score;
    });
```

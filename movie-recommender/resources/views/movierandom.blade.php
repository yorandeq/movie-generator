<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Movie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe6ea; /* Soft pink background */
            color: #e60023; /* Deep red text */
            text-align: center;
        }
        .container {
            margin-top: 50px;
        }
        .movie-card {
            background: #ffccd5; /* Light pink card */
            border-radius: 12px;
            padding: 20px;
            width: 300px;
            margin: 0 auto;
            text-align: center;
            transition: transform 0.3s ease-in-out;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border: 2px solid #e60023; /* Red border */
        }
        .movie-card:hover {
            transform: scale(1.08);
        }
        .title {
            font-size: 22px;
            font-weight: bold;
            margin-top: 10px;
        }
        .description {
            font-size: 16px;
            margin-top: 10px;
            color: #333;
        }
        button {
            padding: 10px 15px;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
            background-color: #e60023;
            border: none;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            transition: background 0.3s ease-in-out;
        }
        button:hover {
            background-color: #b3001b;
        }

        /* Falling Hearts Animation */
        .heart {
            position: fixed;
            top: -50px;
            font-size: 24px;
            color: #e60023;
            opacity: 0.8;
            animation: fall linear infinite;
        }

        @keyframes fall {
            to {
                transform: translateY(100vh);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <h1>❤️ Random Movie Recommendation ❤️</h1>

    <div class="container">
        <div class="movie-card">
            <div class="title">🎬 {{ $movie['title'] ?? 'Unknown Movie' }}</div>
            <div class="description">{{ $movie['description'] ?? 'No description available.' }}</div>
        </div>

        <form method="GET" action="{{ url('/random-movie') }}">
            <button type="submit">Get Another Movie 🎥</button>
        </form>
    </div>

    <!-- Falling Hearts Script -->
    <script>
        function createHeart() {
            const heart = document.createElement("div");
            heart.classList.add("heart");
            heart.innerHTML = "❤️";
            heart.style.left = Math.random() * 100 + "vw";
            heart.style.animationDuration = Math.random() * 3 + 2 + "s"; // Between 2s and 5s
            document.body.appendChild(heart);

            setTimeout(() => {
                heart.remove();
            }, 5000);
        }

        setInterval(createHeart, 300); // Creates a new heart every 300ms
    </script>
</body>
</html>

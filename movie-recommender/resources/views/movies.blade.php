<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popular Movies</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe6ea; /* Soft pink background */
            color: #e60023; /* Deep red text */
            text-align: center;
        }
        .container {
            margin-top: 20px;
        }
        .filter-container {
            margin-bottom: 20px;
        }
        .movie-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .movie-card {
            background: #ffccd5; /* Light pink card */
            border-radius: 12px;
            padding: 15px;
            width: 200px;
            text-align: center;
            transition: transform 0.3s ease-in-out;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border: 2px solid #e60023; /* Red border */
        }
        .movie-card:hover {
            transform: scale(1.08);
        }
        .movie-card a {
            text-decoration: none;
            color: inherit;
            display: block;
        }
        .movie-card img {
            width: 100%;
            border-radius: 10px;
        }
        .title {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }
        .rating {
            margin-top: 5px;
            font-size: 14px;
            color: #e60023; /* Deep red */
        }
        select {
            padding: 8px;
            font-size: 16px;
            background: #ffccd5;
            border: 2px solid #e60023;
            border-radius: 5px;
            color: #e60023;
        }
        button {
            padding: 8px 12px;
            font-size: 16px;
            margin-left: 10px;
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
    <h1>❤️ Meest populaire films ❤️</h1>

    <!-- Genre Filter -->
    <div class="filter-container">
        <form method="GET" action="{{ url('/') }}">
            <label for="genre">Filter</label>
            <select name="genre" id="genre">
                <option value="">Alle genres</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre['id'] }}" {{ $selectedGenre == $genre['id'] ? 'selected' : '' }}>
                        {{ $genre['name'] }}
                    </option>
                @endforeach
            </select>
            <button type="submit">Filteren</button>
        </form>
    </div>

    <div class="movie-container">
        @foreach ($movies as $movie)
            <div class="movie-card">
                <a href="https://www.themoviedb.org/movie/{{ $movie['id'] }}" target="_blank">
                    <img src="https://image.tmdb.org/t/p/w200{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}">
                    <div class="title">{{ $movie['title'] }}</div>
                    <div class="rating">👍🏽 {{ $movie['vote_average'] }}/10</div>
                </a>
            </div>
        @endforeach
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

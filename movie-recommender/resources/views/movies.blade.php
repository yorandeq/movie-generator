<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222;
            color: white;
            text-align: center;
        }
        .movie-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        .movie-card {
            background: #333;
            border-radius: 8px;
            padding: 15px;
            width: 200px;
            text-align: center;
            transition: transform 0.2s ease-in-out;
        }
        .movie-card:hover {
            transform: scale(1.05);
        }
        .movie-card a {
            text-decoration: none;
            color: inherit;
            display: block;
        }
        .movie-card img {
            width: 100%;
            border-radius: 5px;
        }
        .title {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }
        .rating {
            margin-top: 5px;
            font-size: 14px;
            color: #FFD700;
        }
    </style>
</head>
<body>
    <h1>Top Rated Movies</h1>
    <div class="movie-container">
        @foreach ($movies as $movie)
            <div class="movie-card">
                <a href="https://www.themoviedb.org/movie/{{ $movie['id'] }}" target="_blank">
                    <img src="https://image.tmdb.org/t/p/w200{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}">
                    <div class="title">{{ $movie['title'] }}</div>
                    <div class="rating">⭐ {{ $movie['vote_average'] }}/10</div>
                </a>
            </div>
        @endforeach
    </div>
</body>
</html>

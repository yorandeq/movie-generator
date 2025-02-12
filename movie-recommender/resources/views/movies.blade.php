<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popular Movies</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222;
            color: white;
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
        select {
            padding: 8px;
            font-size: 16px;
        }
        button {
            padding: 8px 12px;
            font-size: 16px;
            margin-left: 10px;
            cursor: pointer;
            background-color: #FFD700;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Most Popular Movies</h1>

    <!-- Genre Filter -->
    <div class="filter-container">
        <form method="GET" action="{{ url('/') }}">
            <label for="genre">Filter by Genre:</label>
            <select name="genre" id="genre">
                <option value="">All Genres</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre['id'] }}" {{ $selectedGenre == $genre['id'] ? 'selected' : '' }}>
                        {{ $genre['name'] }}
                    </option>
                @endforeach
            </select>
            <button type="submit">Filter</button>
        </form>
    </div>

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

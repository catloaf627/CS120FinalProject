<?php
/*
 * Fetches and displays popular movies from The Movie Database (TMDb) API
 */
$apiKey = "9c1bd52bd5493546f19dfed521ad003b"; 
$apiUrl = "https://api.themoviedb.org/3/movie/popular?api_key={$apiKey}";

$json = file_get_contents($apiUrl);
$data = json_decode($json, true);

$movies = [];
if (isset($data['results'])) {
    // Get top 6 movies
    $movies = array_slice($data['results'], 0, 6);
}
echo "<div style='max-width: 70%; margin: 0 auto;'>"; 
echo "<h2 class='mb-3'>What's Popular</h2>";
echo "<div class='row g-3'>"; 
foreach ($movies as $movie) {
    $movieId = $movie['id'];
    echo "
    <div class='col-6 col-md-4 col-lg-2 mb-3'>
    <a href='movie.php?id=$movieId' style='text-decoration: none; color: inherit;'>
        <div class='card h-100 shadow-sm'>
            <img src='https://image.tmdb.org/t/p/w500{$movie['poster_path']}' class='card-img-top' alt='poster' />
            <div class='card-body p-2'> <h6 class='card-title text-truncate'>{$movie['title']}</h6>
                <small class='text-muted'>Rating: {$movie['vote_average']}/10</small>
                
                <p class='card-text small d-none' id='desc_{$movie['id']}'>{$movie['overview']}</p>
            </div>
        </div>
        </a>
    </div>";
}
echo "</div>";
echo "</div>";
?>
<?php
/*
 *  Fetches and displays popular movies from The Movie Database (TMDb) API
 */
$apiKey = "9c1bd52bd5493546f19dfed521ad003b"; 
$apiUrl = "https://api.themoviedb.org/3/movie/popular?api_key={$apiKey}";

$json = file_get_contents($apiUrl);
$data = json_decode($json, true);

$movies = [];
if (isset($data['results'])) {
    // Show the top 10 popular movies
    $movies = array_slice($data['results'], 0, 9);
}

echo "<div style='max-width: 60%; margin: 0 auto;'>";
echo "<div class='row g-4'>";

foreach ($movies as $movie) {
    echo "
    <div class='col-12 col-sm-6 col-md-4 mb-3'>
    <div class='card h-100 shadow-sm'>
    <img src='https://image.tmdb.org/t/p/w500{$movie['poster_path']}' class='card-img-top' alt='poster' />
    <div class='card-body'>
    <h5 class='card-title'>{$movie['title']}</h5>
    <p class='card-text'>Rating: {$movie['vote_average']}/10</p>
    <p class='card-text'>Release Date: {$movie['release_date']}</p>
    <p class='card-text hide' id='desc_{$movie['id']}'>{$movie['overview']}</p>
    <button type='button' class='btn btn-primary' id='moreInfoBtn{$movie['id']}' onclick=\"toggleInfo('desc_{$movie['id']}', 'moreInfoBtn{$movie['id']}')\">More</button>
    </div>
    </div>
    </div>";
}
echo "</div>";
echo "</div>";
?>
<script>
function toggleInfo(descID, btnID) {
    let desc = document.getElementById(descID);
    let btn = document.getElementById(btnID);

    desc.classList.toggle("hide");

    if (desc.classList.contains("hide")) {
        btn.textContent = "More";
    } else {
        btn.textContent = "Less";
    }
}
</script>
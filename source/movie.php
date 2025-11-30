<?php 
$movieID = $_GET['id'];
$isLoggedIn = true;
if (!$movieID) {
    echo "<h1>No Movie ID provided.</h1>";
    exit();
}
$apiKey = "9c1bd52bd5493546f19dfed521ad003b"; 
$apiUrl = "https://api.themoviedb.org/3/movie/$movieID?api_key={$apiKey}&language=en-US&append_to_response=images,credits,reviews";

// Handle potential errors in fetching data
$json = @file_get_contents($apiUrl); 
if (!$json) {
    echo "<h1>Error fetching movie data.</h1>";
    exit();
}
$data = json_decode($json, true);

// Poster image
$poster = !empty($data["poster_path"]) ? "https://image.tmdb.org/t/p/w500" . $data["poster_path"] : "https://via.placeholder.com/500x750?text=No+Image";

// Background Images
$backdropUrl = !empty($data["backdrop_path"]) ? "https://image.tmdb.org/t/p/original" . $data["backdrop_path"] : "";

// Show top 10 cast members
$cast = [];
if (!empty($data["credits"]["cast"])) {
    $cast = array_slice($data["credits"]["cast"], 0, 10);
}

// Filter out cast members without profile images
$cast = array_filter($cast, function($actor) {
    return !empty($actor['profile_path']);
});

// show recent 10 views if available
$reviews = [];
if (!empty($data["reviews"]["results"])) {
    $reviews = array_slice($data["reviews"]["results"], 0, 10);
}

// show up to 6 backdrops if available
$backdrops = [];
if (!empty($data["images"]["backdrops"])) {
    $backdrops = array_slice($data["images"]["backdrops"], 0, 9);
}

// Find Director(s)
$directors = [];
if (!empty($data["credits"]["crew"])) {
    foreach ($data["credits"]["crew"] as $crewMember) {
        if ($crewMember["job"] === "Director") {
            $directors[] = $crewMember["name"];
        }
    }
}
// Join multiple directors with a comma
$directorList = implode(", ", $directors);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($data['title']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"crossorigin="anonymous"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"> </script>
    <link rel="stylesheet" href="./style.css"/>
    
    <style>
        body {
            background-color: #0d0d0d;
            color: #fff;
        }
        .section-title {
            margin-top: 40px;  
            margin-bottom: 20px;
            border-left: 5px solid #e50914; 
        }
    </style>
</head>

<body> 
<?php include "nav.php"; ?>
<div class="movie-info w-100 w-lg-75 mx-auto">
<div class="container movie-header">
    <div class="row">
        <div class="col-md-3 text-center text-md-start">
            <img src="<?php echo $poster; ?>" class="poster img-fluid" alt="Poster">
        </div>

        <div class="col-md-9 pt-4 pt-md-0">
            <h1 class="display-5 fw-bold"><?php echo htmlspecialchars($data["title"]); ?></h1>
            <div class="mb-3">
                <?php foreach ($data["genres"] as $genre): ?>
                    <span class="badge bg-secondary me-1"><?php echo $genre["name"]; ?></span>
                <?php endforeach; ?>
            </div>
            
            <div class="d-flex flex-wrap gap-4 mb-3 text-secondary">
                <span>📅 <?php echo $data["release_date"]; ?></span>
                <span>⏱ <?php echo $data["runtime"]; ?> min</span>
                <span>⭐ <?php echo $data["vote_average"]; ?>/10 (<?php echo $data["vote_count"]; ?>)</span>
            </div>

            <h4 class="mt-4">Overview</h4>
            <p class="lead fs-6"><?php echo nl2br(htmlspecialchars($data["overview"])); ?></p>

            <?php if (!empty($directorList)): ?>
            <div class="mb-3">
                <strong>Director:</strong> 
                <span class="text-light"><?php echo htmlspecialchars($directorList); ?></span>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="mt-4 d-flex gap-2">
        <?php if ($isLoggedIn): ?>
            <a href="watchlist.php?id=<?php echo $movieID; ?>" class="btn btn-warning btn-lg">Add to Watchlist</a>
            <a href="mwatched.php?id=<?php echo $movieID; ?>" class="btn btn-success btn-lg">Mark as Watched</a>
        <?php endif; ?>
        </div>
        </div>
    </div>

<div class="container pb-5">

    <?php if (!empty($cast)): ?>
    <h3 class="section-title">Top Cast</h3>
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">
        <?php foreach ($cast as $actor): 
            $profilePath = $actor['profile_path'] 
                ? "https://image.tmdb.org/t/p/w200" . $actor['profile_path'] 
                : "https://via.placeholder.com/200x300?text=No+Img";
        ?>
        <div class="col">
            <div class="card cast-card h-100">
                <img src="<?php echo $profilePath; ?>" class="cast-img" alt="<?php echo htmlspecialchars($actor['name']); ?>">
                <div class="cast-body">
                    <p class="card-name fw-bold mb-0 text-truncate"><?php echo htmlspecialchars($actor['name']); ?></p>
                    <p class="card-text small text-secondary mb-0 text-truncate"><?php echo htmlspecialchars($actor['character']); ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php if (!empty($backdrops)): ?>
    <h3 class="section-title">Gallery</h3>
    <div class="row row-cols-1 row-cols-md-3 g-3">
        <?php foreach ($backdrops as $img): ?>
        <div class="col">
            <img src="https://image.tmdb.org/t/p/w500<?php echo $img['file_path']; ?>" class="gallery-img img-fluid rounded w-100" alt="Backdrop">
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php if (!empty($reviews)): ?>
    <h3 class="section-title">Recent Reviews</h3>
    <div class="row">
        <div class="col-12">
    <?php foreach ($reviews as $review): ?>
        <div class="review-card mb-3 p-3 border rounded bg-dark text-light">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="review-author fw-bold text-warning">
                    <?php echo htmlspecialchars($review['author']); ?>
                </span>
                <span class="review-date text-muted small">
                    <?php echo date("F j, Y", strtotime($review['created_at'])); ?>
                </span>
            </div>
            
            <p class="mb-0 text-secondary">
                <?php echo nl2br(htmlspecialchars($review['content'])); ?>
            </p>
        </div>
    <?php endforeach; ?>
    </div>
    <?php endif; ?>

</div>
</div>

</body>
</html>
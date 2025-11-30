<?php $query = $_GET['query'];
    $query = $_GET['query'] ?? '';

    if ($query === '') {
    echo "<h1>No search query provided.</h1>";
    exit();
    }
    $apiKey = "9c1bd52bd5493546f19dfed521ad003b"; 
    $apiUrl = "https://api.themoviedb.org/3/search/movie?api_key={$apiKey}&query=". urlencode($query);

    $json = file_get_contents($apiUrl);
    $data = json_decode($json, true);
    if (!empty($data['results']) && count($data['results']) === 1) {
        $movie = $data['results'][0];
        header("Location: movie.php?id=" . $movie['id']);
        exit();
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="./style.css"/>
        <style>
        body {
            background-color: #0d0d0d;
            color: #fff;
        }
        .movie-card {
            background: #1a1a1a;
            border-radius: 12px;
            padding: 25px;
        }
        .poster {
            border-radius: 12px;
            max-width: 100%;
        }
        .label {
            font-weight: 600;
            opacity: 0.75;
        }
    </style>


</head>
<body>
<?php include 'nav.php'; ?>
<div class="container mt-5">
    <?php if (!empty($data['results'])): ?>
        <div class="row g-4">
            <?php foreach ($data['results'] as $movie): ?>
                <div class="col-md-4 col-lg-3">
                    <a href="movie.php?id=<?php echo $movie['id']; ?>" style="text-decoration: none; color: inherit;">
                    <div class="movie-card">
                        <img src="https://image.tmdb.org/t/p/w500<?php echo $movie['poster_path']; ?>" alt="Poster" class="poster mb-3">
                        <h5><?php echo htmlspecialchars($movie['title']); ?></h5>
                        <p><span class="label">Release Date:</span> <?php echo htmlspecialchars($movie['release_date']); ?></p>
                        <p><span class="label">Rating:</span> <?php echo htmlspecialchars($movie['vote_average']); ?>/10</p>
                    </div>
            </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No results found for "<?php echo htmlspecialchars($query); ?>". Please try again.</p>
    <?php endif; ?>
</div>
</body>
</html>
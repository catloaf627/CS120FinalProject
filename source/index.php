<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
    
    <link rel="stylesheet" href="./style.css"/>
    <style>
        .hero-section {
  width: 100%;
}

.hero-bg {
  height: 400px;
  background-image: url("https://image.tmdb.org/t/p/original/zkThiZAaAie8Lw7RAc5yPTOewBV.jpg$0");
  background-size: cover;
  background-position: 70% 30%;
  position: relative;
  border-radius: 0;
}

.hero-mask {
  height: 100%;
  width: 100%;
  background-color: rgba(0, 0, 0, 0.55);
}

    </style>

</head>
<body>
<?php include 'nav.php'; ?>
<div class="hero-section">
    <div class="hero-bg">
        <div class="hero-mask d-flex justify-content-center align-items-center" style="height: 100%; background-color: rgba(0, 0, 0, 0.55);">
    <div class="text-white text-center">
        <h1 class="fw-bold">Welcome to MovieHub!</h1>
        <h4 class="mb-4">The ultimate destination for movie enthusiasts</h4>
        <form action="search.php" method="GET">
            <div class="input-group">
                <input type="text" name="query" class="form-control rounded-start-pill" placeholder="Search for a movie" aria-label="Search" autocorrect="off" autocomplete="off" autocapitalize="off" spellcheck="false" required>
                <button class="btn btn-primary rounded-end-pill px-4" type="submit">Search</button>
            </div>
        </form>
    </div>
    </div>
</div>
<br>
<?php include 'trending-movie.php'; ?>
    
<?php include 'popular-movie.php'; ?>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
   <script src="index.js"></script>
    <?php include 'footer.php'; ?>
</body>
</html>
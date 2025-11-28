<?php 
/*
 * Navigation bar component
 */
if (session_status() === PHP_SESSION_NONE) session_start(); 
$isLoggedIn = isset($_SESSION['user']);
?>

<nav class="navbar navbar-dark bg-dark navbar-expand-lg py-2 fs-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="products.php">MovieHub</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="browse.php">Browse</a></li>
        
        <?php if ($isLoggedIn): ?>
            <li class="nav-item"><a class="nav-link" href="watchlist.php">My watchlist</a></li>
            <li class="nav-item"><a class="nav-link" href="watched.php">Watched</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<?php if (!$isLoggedIn): ?>
    <div id="floatingAd" class="card shadow-lg border-warning">
        <div class="card-body text-center position-relative bg-white">
            
            <button type="button" class="btn-close position-absolute top-0 end-0 m-2" 
                    onclick="this.closest('#floatingAd').remove()"></button>

            <img style="margin-top: 20px; width: 150px;" src="https://www.themoviedb.org/assets/2/v4/logos/v2/blue_short-8e7b30f73a4020692ccca9c88bafe5dcb6f8a62a4c6bc55cd9ba82bb2cd95f6c.svg" 
            class="img-fluid mb-2" alt="Ad">
            
            <p class="small text-muted mb-2">Join Prime for an ad-free experience!</p>
            <a href="login.php" class="btn btn-dark btn-sm w-100">Subscribe</a>
        </div>
    </div>
<?php endif; ?>
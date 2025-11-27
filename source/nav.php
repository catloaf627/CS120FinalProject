<?php 
/*
 *  Navigation bar component
 * Starts a session only if none exists
 * Checks if user is logged in and displays appropriate links
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
            <!-- Show user profile links only if logged in -->
         <li class="nav-item"><a class="nav-link" href="watchlist.php">My watchlist</a></li>
         <li class="nav-item"><a class="nav-link" href="watched.php">Watched</a></li>
         <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        <?php else: ?>
            <!-- Show login link if not logged in -->
            <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
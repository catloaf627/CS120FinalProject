## A Movie Discovery Web App using TMDb API

The website allows users to explore and discover movies using data from [The Movie Database (TMDb) API](https://developer.themoviedb.org/docs/getting-started).

Built with PHP, SQL, HTML, and JavaScript, the site enable users to search and filter movies by rating, genre, release date, etc.

Registered users can create accounts, log in, and save their favorite movies.

### Goals

Our goal is to develop a dynamic movie website that allow users to:

1. Browse movies using TMDb API, with API calls handled by PHP.
2. Filter movies by different criteria, such as rating, genre and release date.
3. User registration and login are handled by PHP, and user credentials are stored in a SQL database.
4. User can save favorite movies, with information stored in a SQL database.
5. Dynamic pages are generated with PHP and Javascript.

### Major components

#### Frontend

1. Homepage:
   - Search bar for movie title
   - Filter panel to enable user to filter movies by rating, genre, etc.
   - Movies cards displaying movie posters and titles.
   - “Add to Favorites” button on each movie card.
2. User login/register page
3. Favorite pages: display users' saved favorite movies.

#### Backend

1. User registration and authentication.
2. PHP scripts to handle API and filter movies.
3. PHP scripts to add and display registered users' favorite movies.

#### SQL database

1. Table to store user credentials
2. Table to store users' favorite movies.

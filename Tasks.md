## Member 1: Frontend & UI/UX Lead

- Focus: The "Face" of the website. This member handles how the site looks and feels.
- Pages: Build the HTML structure for the Homepage, User Dashboard, and List pages.
- Styling: Write the CSS (or implement a framework like Bootstrap) to ensure the site is responsive and the "Movie Cards" look good.
- Interactions: Write the JavaScript for client-side events, such as clicking "Add to Watch List" buttons or toggling the "Filter panel".
- Ads: Implement the frontend logic to display ad placeholders if the user is identified as "Free".

## Member 2: Backend - Users & Database

- Focus: The "Vault." This member handles everything related to who the user is and what they own.
- SQL: Design and create the users table, watch_list table, and watched_list table
- Auth API: Implement the Google Authentication API and create the PHP login script.
- Session Logic: Create the PHP session check to determine if a user is "Free" or "Paid" (Monetization Strategy).
- List Logic: Write the PHP scripts to INSERT and DELETE movies from the database when a user updates their Watch List or Watched List.

## Member 3: Backend - TMDb API & Content

- Focus: The "Engine." This member handles getting movie data and processing searches.
- TMDb Integration: Write the PHP functions to query the TMDb API (getting popular movies, searching by title, getting details).
- Search & Filter: Implement the backend logic to handle sorting by rating, genre, and release date.
- Reviews: Write the PHP script to handle saving user reviews/notes to the SQL database (working with Member 2's database structure).
- Homepage Data: Fetch the data for the "popular movies posters" gallery on the homepage.

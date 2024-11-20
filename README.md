# Rest Blog
Rest Blog is a web-based blog application built with Laravel 8 and Bootstrap 5. This application allows users to create, read, update, and delete blog posts. It also includes user authentication, enabling only registered users to manage their blogs.


## Key Features
1. User Authentication:
    
    - User registration.
    - Login and logout functionality.
    - Password reset for users who forget their credentials.

2. Blog Management:
    
    - Create new blog posts.
    - View all blogs.
    - Edit existing blog posts.
    - Delete blog posts.

3. Responsive Design:

    - Built with Tailwind CSS for a modern and responsive UI.


## Technologies Used
- **Backend Framework:** Laravel 8
- **Frontend Framework:** Bootstrap 5
- **Database:** MySQL


## Installation and Usage
Follow these steps to set up the project locally:

### Prerequisites
- PHP ≥ 8.1
- Composer
- MySQL / MariaDB

### Installation Steps
1. Clone this repository to your local directory:

    ```bash
    git clone https://github.com/AcilRestu12/rest-blog.git
    cd rest-blog
    ```

2. Install backend dependencies using Composer:
    ```bash
    composer install
    ```


3. Copy the .env.example file and rename it to .env:
    ```bash
    cp .env.example .env
    ```

4. Configure the database in the .env file:
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=rest_blog
    DB_USERNAME=root
    DB_PASSWORD=your_password
    ```

5. Generate the application key:

    ```bash
    php artisan key:generate
    ```

6. Run migrations and seed the database:

    ```bash
    php artisan migrate --seed
    ```

7. Run migrations and seed the database:

    ```bash
    php artisan serve
    ```

8. Open the application in your browser:

    ```
    http://127.0.0.1:8000
    ```


## Project Structure
- **routes/web.php:** Contains all the routes used in the application.
- **app/Http/Controllers:** Contains backend logic for blog management and authentication.
- **resources/views:** Blade templates for frontend views.
- **public/css & public/js:** Compiled Bootstrap and JavaScript files.


## Contribution
Contributions are welcome! If you’d like to contribute, please fork this repository and submit a pull request.


## License
The project is licensed under the MIT license - see the [LICENSE](LICENSE) file for more details.

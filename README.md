# Laravel User Manager

- [Vue 3](https://vuejs.org/) + [Vite](https://vitejs.dev/) + [Vitest](https://vitest.dev/)
- [Laravel](https://laravel.com/) + [Splade](https://splade.dev/)
- [Element Plus](https://element-plus.org/en-US/)
- [PrimeIcons](https://www.primefaces.org/showcase/icons.xhtml)

## Installation

1. Clone the repository and `cd` into it
   ```bash
   $ cd /path/to/project
   ```
2. Install the dependencies

   ```bash
   $ npm install
   ```

   ```bash
   $ composer install
   ```

3. Copy the `.env.example` file as `.env`
4. Generate the application key
   ```bash
   $ php artisan key:generate
   ```
5. Configure the database credentials in the `.env` file
6. Perform the migrations
   ```bash
   $ php artisan migrate --seed
   ```
7. Create the symbolic link for storagte
   ```bash
   $ php artisan storage:link
   ```

### Credentials

```
Email: admin@example.com
Password: password
```

```
Email: manager@example.com
Password: password
```

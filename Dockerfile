# On part d'une version de PHP 8.2
FROM php:8.2-cli

# 1. Installer les outils système nécessaires (Git, Zip, etc.)
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libonig-dev \
    curl \
    gnupg

# 2. Installer les extensions PHP requises par Laravel
RUN docker-php-ext-install pdo pdo_mysql zip mbstring bcmath

# 3. Installer Composer (le gestionnaire de paquets PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Installer Node.js (pour compiler tes fichiers CSS/JS avec Vite)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# 5. Préparer le dossier de travail
WORKDIR /var/www/html
COPY . .

# 6. Installer les dépendances du projet
RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

# 7. Configurer les permissions pour Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 8. Lancer le serveur Laravel sur le port fourni par Render ($PORT)
CMD php artisan serve --host=0.0.0.0 --port=$PORT

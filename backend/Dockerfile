# backend/Dockerfile

FROM php:8.0.30-cli

# Instala extensiones necesarias para Laravel + PostgreSQL
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libpq-dev \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Crea directorio de trabajo
WORKDIR /var/www/html

# Copia el contenido del proyecto (opcional si usas volumes)
COPY . .

# Instala dependencias
RUN composer install

# Puerto expuesto
EXPOSE 8000

# Comando de inicio
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

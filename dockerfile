# Utilisez une image de base PHP avec Apache
FROM php:8.2-apache

# Activez mod_rewrite
RUN a2enmod rewrite

# Copiez les fichiers de l'application dans le conteneur
COPY . /var/www/html/

# Exposez le port 80
EXPOSE 80

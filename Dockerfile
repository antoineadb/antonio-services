FROM wordpress:latest

COPY --chown=www-data:www-data . /usr/src/wordpress/wp-content/themes/antonio-services/
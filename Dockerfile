FROM php:8.2-cli

RUN docker-php-ext-install pdo pdo_mysql
WORKDIR /app
COPY wait-for-db.sh .
RUN chmod +x /app/wait-for-db.sh
CMD ["./wait-for-db.sh"]


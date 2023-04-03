FROM php:8.1.1-apache

RUN apt-get update -y && \
    apt-get install -y \
        curl \
        libjpeg-dev \
        libwebp-dev \
        libzip-dev \
        libfreetype6-dev \
        unzip \
        sendmail \
        libpng-dev \
        zlib1g-dev \
        libonig-dev \
        supervisor \
        && mkdir -p /etc/supervisor/conf.d

RUN mkdir -p "/etc/supervisor/logs"

RUN docker-php-ext-install zip
RUN docker-php-ext-configure gd -enable-gd --with-freetype --with-jpeg --with-webp
RUN docker-php-ext-install gd

RUN apt-get install -y zip libzip-dev \
  && docker-php-ext-configure zip \
  && docker-php-ext-install zip

RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-enable mysqli pdo pdo_mysql


RUN touch /usr/local/etc/php/conf.d/uploads.ini \
    && echo "upload_max_filesize = 2024M" >> /usr/local/etc/php/conf.d/uploads.ini
RUN echo "post_max_size = 2024M" >> /usr/local/etc/php/conf.d/uploads.ini
RUN echo "memory_limit = -1" >> /usr/local/etc/php/conf.d/uploads.ini
RUN echo "max_execution_time = 30000" >> /usr/local/etc/php/conf.d/uploads.ini
RUN echo "max_input_time = 30000" >> /usr/local/etc/php/conf.d/uploads.ini
RUN echo "max_file_uploads = 1000" >> /usr/local/etc/php/conf.d/uploads.ini

RUN mkdir -p "/etc/supervisor/logs"

COPY .docker/supervisor/conf.d/queue-worker.conf /etc/supervisor/queue-worker.conf
COPY .docker/supervisor/conf.d/queue-worker.conf /etc/queue-worker.conf
RUN echo "alias super='/usr/bin/supervisord -c /etc/supervisor/conf.d/queue-worker.conf'" >> ~/.bashrc

CMD ["/usr/bin/supervisord", "-n", "-c",  "/etc/supervisor/queue-worker.conf"]
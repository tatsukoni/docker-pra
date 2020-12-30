FROM nginx:1.19.6-alpine

# 設定ファイル反映
ARG fpm_host=localhost
ENV FPM_HOST=$fpm_host

COPY ./nginx.conf /etc/nginx/nginx.conf.tmp
RUN envsubst '$$FPM_HOST'< /etc/nginx/nginx.conf.tmp > /etc/nginx/nginx.conf

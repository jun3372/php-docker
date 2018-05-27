FROM debian:latest

LABEL maintainer="Jun <ZhouJun3372@Gmail.Com>"

# 设置国内源
COPY sources.list /etc/apt/sources.list

# 安装composer
# COPY composer /usr/local/bin/composer


# 更新源
RUN apt-get update && apt-get upgrade -y
# 安装 wget
RUN apt install wget -y

# 添加 GPG
RUN apt -y install software-properties-common apt-transport-https lsb-release ca-certificates

RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://mirror.xtom.com.hk/sury/php/apt.gpg

# 添加 sury 软件源
RUN sh -c 'echo "deb https://mirror.xtom.com.hk/sury/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list'

# 更新源
RUN apt-get update && apt-get upgrade -y

# 安装PHP
RUN apt-get install php7.2-fpm php7.2-mysql php7.2-curl php7.2-gd php7.2-mbstring php7.2-xml php7.2-xmlrpc php7.2-zip php7.2-opcache php7.2-redis -y

RUN sed -i 's/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/' /etc/php/7.2/fpm/php.ini

# 安装NGINX
RUN apt-get -y install nginx -y

RUN apt install curl -y

RUN apt install git -y



# CMD ["nginx", "start"]

EXPOSE 80 443

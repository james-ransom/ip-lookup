FROM centos:7
RUN yum update -y && \
    yum install -y epel-release

RUN yum install -y http://rpms.remirepo.net/enterprise/remi-release-7.rpm && \
    yum install -y yum-utils && \
    yum-config-manager --enable remi-php73 && \
    yum -y update

RUN yum install -y php-fpm php-xml php-cli php-bcmath php-dba php-gd php-intl php-mbstring php-pdo php-pecl-apcu php-pecl-imagick

RUN yum install -y php-pecl-couchbase2 php-gd php-pecl-geoip php-gmp php-pecl-gnupg php-pecl-grpc  php-pecl-igbinary  php-pecl-imagick php-intl php-json php-xml php-mbstring php-pecl-mcrypt php-pecl-memcached php-pecl-msgpack php-mysqlnd php-pecl-crypto  php-xmlrpc php-tidy php-opcache php-pspell.x86_64

RUN useradd -M -d /code -s /bin/false nginx

RUN mkdir -p /run/php-fpm && \
    chown nginx:nginx /run/php-fpm

RUN mkdir -p /var/lib/php/session && \
    chown nginx:nginx /var/lib/php/session

RUN yum install -y  mysql

COPY ./containers/php-fpm/php-fpm.conf /etc/php-fpm.conf
COPY ./containers/php-fpm/www.conf /etc/php-fpm.d/www.conf
COPY ./containers/php-fpm/php.ini /etc/php.ini

RUN yum -y  install telnet 
RUN yum -y install which




ENV LANG en_US.utf8

# gcc because we need regex and pyldap
# openldap-devel because we need pyldap
RUN yum update -y \
    && yum install -y https://centos7.iuscommunity.org/ius-release.rpm \
    && yum install -y python36u python36u-libs python36u-devel python36u-pip \
    && yum install -y which gcc \ 
    && yum install -y openldap-devel  

# pipenv installation
RUN pip3.6 install pipenv
RUN ln -s /usr/bin/pip3.6 /bin/pip
RUN rm /usr/bin/python
# python must be pointing to python3.6
RUN ln -s /usr/bin/python3.6 /usr/bin/python
RUN python3.6 -V 
RUN python -V 
RUN pip install mysql-connector-python 
RUN pip install xlrd

#RUN yum clean all

CMD php-fpm

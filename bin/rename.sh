#find . -name '*.css' -exec sh -c 'mv "$0" "${0%.css}.scss"' {} \;
pwd
cd ..
pwd
COMPOSER_MEMORY_LIMIT=-1 composer-php7.4 update --lock
ssh localhost -p 222 node -v
ssh localhost -p 222 npm -v
ssh localhost -p 222
cd recart.me
ssh localhost -p 222 npm run prod
pwd

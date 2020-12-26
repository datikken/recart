#find . -name '*.css' -exec sh -c 'mv "$0" "${0%.css}.scss"' {} \;
pwd
cd ..
pwd
composer-php7.4 update --lock
ssh localhost -p 222 node -v
ssh localhost -p 222 npm -v
ssh localhost -p 222 cd recart.me ; npm run prod

#find . -name '*.css' -exec sh -c 'mv "$0" "${0%.css}.scss"' {} \;
pwd
cd ..
pwd
ssh localhost -p 222 node -v
ssh localhost -p 222 npm -v
npm run $1
echo $1

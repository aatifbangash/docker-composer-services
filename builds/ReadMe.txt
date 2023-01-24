Step 1:
docker network create my_network

Step 2:
docker run -d --network my_network --name mongo \
    -p 27017:27017 \
    -e MONGO_INITDB_ROOT_USERNAME=admin \
    -e MONGO_INITDB_ROOT_PASSWORD=password \
    mongo

Step 3:    
docker run -d --network my_network --name mongo-express  \
    -p 8081:8081 \
    -e ME_CONFIG_MONGODB_SERVER=mongo \
    -e ME_CONFIG_MONGODB_ADMINUSERNAME=admin \
    -e ME_CONFIG_MONGODB_ADMINPASSWORD=password \
    mongo-express

Step 4:
docker build -t rehanislam/centos8:php74 .

Step 5:
docker run -d --name httpd  -p 8080:80  -v /var/www/html/:/var/www/html/ rehanislam/centos8:php74


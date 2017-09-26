# kong
Collection of scripts to show capabilities of kong, starting from scratch with some docker commands to setup kong-environment based on kongs documentation


Use these docker commands to get an environment where you can fool around with Kong:

docker run -d --name kong-database -p 9042:9042 cassandra:3

The next one sometimes fails or gets stuck. If so cancel and restart, usualy this should solve the problem
docker run -it --rm --link kong-database:kong-database -e "KONG_DATABASE=cassandra" -e "KONG_PG_HOST=kong-database" -e "KONG_CASSANDRA_CONTACT_POINTS=kong-database" kong:latest kong migrations up

docker run -d --name kong --link kong-database:kong-database -e "KONG_DATABASE=cassandra" -e "KONG_CASSANDRA_CONTACT_POINTS=kong-database" -e "KONG_PG_HOST=kong-database" -p 8000:8000 -p 8443:8443 -p 8001:8001 -p 8444:8444 kong

docker run -d --name kong_dashboard --link kong:kong -p 8080:8080 pgbi/kong-dashboard:v2

The Kong-Dashboard should be available now under http://localhost:8080
The first time you open this page, it asks for the kong endpoint. For me this worked out to be my local IP. Neither 127.0.0.1 worked nor localhost.

From there on, just call the php files in their order, either on a webserver, or by calling them from a local php installation with cli. 
You'll need the curl_extension obviously. 
It should be fairly easy to port the curl calls to any other language as well. 

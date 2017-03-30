run start:
	sudo docker-compose -f docker/docker-compose.yml up --remove-orphans -d

stop:
	sudo docker-compose -f docker/docker-compose.yml down


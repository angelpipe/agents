run start:
	docker-compose -f docker/docker-compose.yml up --remove-orphans -d

stop:
	docker-compose -f docker/docker-compose.yml down


# Путь к корню вашего проекта
PROJ_ROOT=/home/altenrion/PhpstormProjects/vuznauka/

build:
	@echo "Строим образ контейнера приложения"
	docker build -t vuznauka-app-image -f "Dockerfile-app" "$(PROJ_ROOT)"

	@echo "Строим образ контейнера БД"
	docker build -t vuznauka-db-image -f "Dockerfile-db" "$(PROJ_ROOT)"

rundb:
	@echo "Сначала стартуем контейнер с БД"
	docker run -d -e MYSQL_ROOT_PASSWORD=root --name vuznauka-db vuznauka-db-image

runapp:
	@echo "Теперь контейнер с приложением, связав его с БД-контейнером"
	docker run -d \
		-p 80:80 \
		-v $(PROJ_ROOT):/var/www/html \
		--name vuznauka-app \
		--link vuznauka-db \
		vuznauka-app-image
run: rundb runapp

stop:
	set -e

	@echo "Stopping containers..."
	docker stop vuznauka-db vuznauka-app

	@echo "Removing containers..."
	docker rm vuznauka-db vuznauka-app

	@echo "Done."

push:
	@echo "Prepare repo"
	@echo "----------------------------------------"
	git add .
	git rm --cached .data/vuznauka.sql
	git commit -m "$(MSG)"
	git push origin master
	@echo "----------------------------------------"


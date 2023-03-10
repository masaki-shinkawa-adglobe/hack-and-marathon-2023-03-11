include docker/.env

# .envの設定を優先してセットする
project_name_frontend := $(PROJECT_NAME_FRONTEND)

compose_file_frontend := $(if $(COMPOSE_FILE_FRONTEND),$(COMPOSE_FILE_FRONTEND),"./docker/docker-compose-frontend.yml")

# frontend
frontend-init:
	docker compose -f $(compose_file_frontend) -p $(project_name_frontend) build --no-cache
	-@docker compose -f $(compose_file_frontend) -p $(project_name_frontend) down --volumes
	docker compose -f $(compose_file_frontend) -p $(project_name_frontend) up -d

frontend-build:
	@docker compose -f $(compose_file_frontend) -p $(project_name_frontend) build --no-cache

frontend-up:
	@docker compose -f $(compose_file_frontend) -p $(project_name_frontend) up -d

frontend-down:
	@docker compose -f $(compose_file_frontend) -p $(project_name_frontend) down --volumes

frontend-exec:
	@docker compose -f $(compose_file_frontend) -p $(project_name_frontend) exec $(args)

frontend-ps:
	@docker compose -f $(compose_file_frontend) -p $(project_name_frontend) ps

# backend

# 全てに同じ操作をするコマンド
all-init:
	make frontend-init

all-up:
	make frontend-up

all-down:
	make frontend-down

all-ps:
	make frontend-ps

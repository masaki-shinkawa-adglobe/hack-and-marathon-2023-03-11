include docker/.env

# .envの設定を優先してセットする
project_name_frontend := $(PROJECT_NAME_FRONTEND)

compose_file_frontend := $(if $(COMPOSE_FILE_FRONTEND),$(COMPOSE_FILE_FRONTEND),"./docker/docker-compose-frontend.yml")

project_name_backend := $(PROJECT_NAME_BACKEND)

compose_file_backend := $(if $(COMPOSE_FILE_BACKEND),$(COMPOSE_FILE_BACKEND),"./docker/docker-compose-backend.yml")

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
backend-init:
	docker compose -f $(compose_file_backend) -p $(project_name_backend) build --no-cache
	-@docker compose -f $(compose_file_backend) -p $(project_name_backend) down --volumes
	docker compose -f $(compose_file_backend) -p $(project_name_backend) up -d

backend-build:
	@docker compose -f $(compose_file_backend) -p $(project_name_backend) build --no-cache

backend-up:
	@docker compose -f $(compose_file_backend) -p $(project_name_backend) up -d

backend-down:
	@docker compose -f $(compose_file_backend) -p $(project_name_backend) down --volumes

backend-exec:
	@docker compose -f $(compose_file_backend) -p $(project_name_backend) exec $(args)

backend-ps:
	@docker compose -f $(compose_file_backend) -p $(project_name_backend) ps

# 全てに同じ操作をするコマンド
all-init:
	make frontend-init
	make backend-init

all-up:
	make frontend-up
	make backend-up

all-down:
	make frontend-down
	make backend-down

all-ps:
	make frontend-ps
	make backend-ps

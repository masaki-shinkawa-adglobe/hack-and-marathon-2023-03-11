FROM node:18.15-alpine

WORKDIR /workspace

RUN apk update && \
    apk upgrade && \
    apk add git vim

COPY . .

EXPOSE 3000

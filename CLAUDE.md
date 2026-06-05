# CLAUDE.md - lab-realtime-pubsub

## O que é

Lab de padrão Pub/Sub em tempo real para IoT: PHP publica dados de sensores no Redis; Node.js assina e distribui via WebSocket para o browser.

## Stack

- PHP (publisher HTTP, porta 8080)
- Node.js + Socket.IO (subscriber WebSocket, porta 3000)
- Redis (message broker Pub/Sub, porta 6379)
- RedisInsight (monitoramento, porta 5540)
- Frontend HTML/JS (consumidor WebSocket)
- Docker Compose

## Estrutura

```
docker-compose.yml   -> Orquestra Redis, RedisInsight, PHP e Node.js
index.html           -> Frontend que consome WebSocket (Socket.IO)
php/                 -> Publisher: recebe POST de sensores e publica no Redis
php/index.php        -> Endpoint HTTP do publisher
node/                -> Subscriber: assina Redis e emite via Socket.IO
node/server.js       -> Servidor WebSocket
```

## Comandos

```bash
docker compose up -d     # Subir stack completa
docker compose down      # Parar stack
```

## Padrões

- Fluxo: Sensor → POST PHP → Redis publish → Node.js subscribe → WebSocket → Browser
- PHP e Node.js são containers independentes; comunicação exclusivamente via Redis
- Lab educacional: sem autenticação nos endpoints

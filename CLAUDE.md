# CLAUDE.md - lab-realtime-pubsub

## What it is

Real-time Pub/Sub pattern lab for IoT: PHP publishes sensor data to Redis; Node.js subscribes and distributes it via WebSocket to the browser.

## Stack

- PHP (HTTP publisher, port 8080)
- Node.js + Socket.IO (WebSocket subscriber, port 3000)
- Redis (Pub/Sub message broker, port 6379)
- RedisInsight (monitoring, port 5540)
- HTML/JS frontend (WebSocket consumer)
- Docker Compose

## Structure

```
docker-compose.yml   -> Orchestrates Redis, RedisInsight, PHP and Node.js
index.html           -> Frontend that consumes the WebSocket (Socket.IO)
php/                 -> Publisher: receives sensor POSTs and publishes to Redis
php/index.php        -> Publisher HTTP endpoint
node/                -> Subscriber: subscribes to Redis and emits via Socket.IO
node/server.js       -> WebSocket server
```

## Commands

```bash
docker compose up -d     # Start the full stack
docker compose down      # Stop the stack
```

## Patterns

- Flow: Sensor → POST PHP → Redis publish → Node.js subscribe → WebSocket → Browser
- PHP and Node.js are independent containers; communication exclusively via Redis
- Educational lab: no authentication on the endpoints

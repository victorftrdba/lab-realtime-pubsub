const io = require("socket.io")(3000, { cors: { origin: "*" } });
const { createClient } = require("redis");

const client = createClient({ url: "redis://redis:6379" });

async function start() {
  await client.connect();
  console.log("Connected to Redis");

  const subscriber = client.duplicate();
  await subscriber.connect();

  await subscriber.subscribe("sensor_updates", (message) => {
    const data = JSON.parse(message);
    console.log("Redis Message Received:", data);

    io.emit("sensor_push", data);
  });
}

start();

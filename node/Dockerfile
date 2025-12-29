# Use a slim version of Node.js for a smaller footprint
FROM node:20-slim

# Set the working directory inside the container
WORKDIR /app

# Copy package files first to leverage Docker's cache layer
# This means 'npm install' only runs if you change your dependencies
COPY package*.json ./

# Install only production dependencies
RUN npm install --production

# Copy the rest of your application code
COPY . .

# Your Socket.io port
EXPOSE 3000

# Use 'node' directly instead of 'npm start' for better signal handling (SIGTERM)
CMD ["node", "server.js"]
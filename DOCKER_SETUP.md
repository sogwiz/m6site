# Docker Setup Guide

This project is now dockerized for development with hot reload support.

## Prerequisites

You need to have Docker and Docker Compose installed:
- [Docker Desktop](https://www.docker.com/products/docker-desktop) (includes both Docker and Docker Compose)

## Quick Start

### 1. Build and Start the Container

```bash
docker-compose up
```

This will:
- Build the Docker image
- Install all npm dependencies
- Start the Vite dev server on port 3000
- Enable hot reload for file changes

### 2. Access the Application

Once the container is running, open your browser and navigate to:

```
http://localhost:3000
```

### 3. Making Code Changes

Edit any files in your local project directory. The changes will:
- Be automatically detected by the Vite dev server
- Trigger hot module replacement (HMR)
- Reflect in your browser without requiring a full page reload

## Useful Docker Commands

### Stop the Container

```bash
docker-compose down
```

### View Logs

```bash
docker-compose logs -f
```

### Rebuild the Image (after installing new dependencies)

```bash
docker-compose down
docker-compose up --build
```

### Access Container Shell

```bash
docker-compose exec web sh
```

### Install New Dependencies

If you need to add new npm packages:

```bash
docker-compose exec web npm install <package-name>
```

## Build for Production

### Using Docker

```bash
docker-compose exec web npm run build
```

This will create a `dist/` directory with optimized production files.

### Deploy Built Files

The built files in `dist/` can be deployed to any static hosting service (Netlify, Vercel, GitHub Pages, etc.).

## Troubleshooting

### Hot Reload Not Working

If changes aren't being detected:

1. Check that your files are saved
2. Verify the volume mount in `docker-compose.yml` is correct
3. Restart the container: `docker-compose restart`

### Port Already in Use

If port 3000 is already in use, modify the `docker-compose.yml`:

```yaml
ports:
  - "3001:3000"  # Maps host port 3001 to container port 3000
```

### Node Modules Issues

If you encounter node_modules issues, remove the volume and rebuild:

```bash
docker-compose down -v
docker-compose up --build
```

## Architecture

- **Dockerfile**: Multi-stage build for efficiency
- **docker-compose.yml**: Defines the web service with volume mounts for hot reload
- **.dockerignore**: Excludes unnecessary files from the Docker build context

The setup uses:
- Node.js 20 Alpine Linux (lightweight base image)
- Volume mounts for live file synchronization
- Dumb-init to properly handle process signals

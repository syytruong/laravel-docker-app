# Laravel Docker App

## Requirements
- Docker
- Docker Compose
- Git
- Node.js and npm
- Composer
- Laravel

## Installation
1. Clone the repository:
   ```sh
   git clone <your-github-repo-url>
   cd laravel-docker-app
   ```

2. Install dependencies:
    ```sh
    composer install
    npm install
    ```

3. Start the application
    ```sh
    ./scripts/start.sh
    ```

4. Stop the application
    ```sh
    ./scripts/stop.sh
    ```
## Usage
- The application will be available at http://localhost.
- Use the /api/orders endpoint to submit order payloads.
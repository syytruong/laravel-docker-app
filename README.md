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

## Testing
### Using `curl`
You can use `curl` to send a test request to the `/api/orders` endpoint:

```sh
curl -X POST http://localhost/api/orders \
     -H "Content-Type: application/json" \
     -d '{
           "first_name": "Alan",
           "last_name": "Turing",
           "address": "123 Enigma Ave, Bletchley Park, UK",
           "basket": [
             {
               "name": "Smindle ElePHPant plushie",
               "type": "unit",
               "price": 295.45
             },
             {
               "name": "Syntax & Chill",
               "type": "subscription",
               "price": 175.00
             }
           ]
         }'
```

### Using Postman

1. Open Postman
2. Create a new POST request
3. Set the request URL to:
`http://localhost/api/orders`
4. Set the request headers:
    - Key: `Content-Type`
    - Value: `application/json`
5. Set the request body:
    - Select `raw` and `JSON` format.
    - Past the following JSON:
    ```sh
    {
        "first_name": "Alan",
        "last_name": "Turing",
        "address": "123 Enigma Ave, Bletchley Park, UK",
        "basket": [
            {
            "name": "Smindle ElePHPant plushie",
            "type": "unit",
            "price": 295.45
            },
            {
            "name": "Syntax & Chill",
            "type": "subscription",
            "price": 175.00
            }
        ]
     }
```
5. Send the request.

### Verify the Response

    - Success: You should receive a JSON response with the order details and a 201 Created status code.
    - Database: Check your database to ensure the order has been saved correctly.
    - Async Job: Ensure the subscription item is being sent to the third-party endpoint asynchronously.

Example response:
```sh
{
  "id": 1,
  "first_name": "Alan",
  "last_name": "Turing",
  "address": "123 Enigma Ave, Bletchley Park, UK",
  "basket": [
    {
      "name": "Smindle ElePHPant plushie",
      "type": "unit",
      "price": 295.45
    },
    {
      "name": "Syntax & Chill",
      "type": "subscription",
      "price": 175.00
    }
  ],
  "created_at": "2023-10-10T10:00:00.000000Z",
  "updated_at": "2023-10-10T10:00:00.000000Z"
}
```
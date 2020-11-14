# Log aggregator

This application is collecting log information. It allows users to read through logs and filter them through the UI.

The application is using Algolia as an indexing engine in the background to provide faster/more convenient search.

The UI is using VueJS for authentication and searching.

## Local setup

1. Copy `.env.example` to `.env`
1. Create a new database and enter credentials in `.env` file
1. Enter Algolia credentials to `.env` file (`ALGOLIA_APP_ID` and `ALGOLIA_SECRET` - with write permissions)
1. Run migrations `php artisan migrate`
1. Run seeds `php artisan db:seed`
1. Install static files `npm install`
1. Generate static files `npm run dev`
1. Run local server `php artisan serve` 

## Create Log

### Authenticate

In order to use the API methods, user must authenticate

```
curl -X POST http://127.0.0.1:8000/api/sanctum/token \
--header 'Content-Type: application/json' \
--data-raw '{"email": "XXXXX@gmail.com", "password": "XXXXX"}'
```

### Create new log

As a response you will get a token string which you can use to POST the log.

```
curl -X POST http://127.0.0.1:8000/api/logs \
--header 'Content-Type: application/json' \
--data-raw '{"log": "This is my new log"}' \
--header 'Authorization: Bearer XXXXX'   
```

### Notice

For the test purposes, I have left the registration open, so it is easier to register user and test the application.

For the test purposes, the application is deployed on `http://128.199.62.163/`

The following calls include pre-made credentials (just for the purpose of the test) 
```
curl -X POST http://128.199.62.163/api/sanctum/token \
--header 'Content-Type: application/json' \
--data-raw '{"email": "demoUser@test.com", "password": "SomePass123!"}'
```

Add token that you received as a response in the next call
```
curl -X POST http://128.199.62.163/api/logs \
--header 'Content-Type: application/json' \
--data-raw '{"log": "Demo log message"}' \
--header 'Authorization: Bearer XXXXX'   
```

### Further development

* Completely separate UI from the backend (as a fully independent SPA application).
* Implement CI/CD pipeline.
* Scale this up to some advanced log processing service, like Amazon Kinesis Data Streams

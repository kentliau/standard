# Architecture

By separating the frontend and backend "cleanly", we can achieve a more "platform ignorance", the frontend is just a client it only need to know the endpoints' input and output. The Backend is just headless data in and out and it is design just according the API Specs without thinking about visual presentation.

# Full Stack

## API
1. Login endpoint, POST /login, once login the user, the endpoint should return a token that can be used to authenticate the next (b) endpoint
2. Data endpoint, GET /data, expect the request to utilize the first login endpoint to get the token and then send to this endpoint with Bearer token authentication (https://swagger.io/docs/specification/authentication/bearer-authentication/) and if authenticated, should return json {“timestamp”: <current time>} as the response
    1. The current time means the current timestamp of the API server

## Single Page Application
1. The first view of the application should show the login page to input username and password.
2. Upon successful login, a token should be received, and it should use to get the data from the endpoint /data above in a different view. The view should show the time received from the response which is the time

Full Stack Software Developer Test

Ful stack project

You are required to use PHP or other equivalent backend language to create an API then use Vue.js or React to create a single page application to consume the API

## API
1. Login endpoint, POST /login, once login the user, the endpoint should return a token that can be used to authenticate the next (b) endpoint
2. Data endpoint, GET /data, expect the request to utilize the first login endpoint to get the token and then send to this endpoint with Bearer token authentication (https://swagger.io/docs/specification/authentication/bearer-authentication/) and if authenticated, should return json {“timestamp”: <current time>} as the response
    1. The current time means the current timestamp of the API server

## Single Page Application
1. The first view of the application should show the login page to input username and password.
2. Upon successful login, a token should be received, and it should use to get the data from the endpoint /data above in a different view. The view should show the time received from the response which is the time

Share us the project codes preferably via cloud git such as Gitlab, Github, etc. Otherwise, a zip file of the project codes can be shared with us
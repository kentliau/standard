# Build
- `npx vite build` to build the production distribution
- `cd dist` change directory into the dist folder the generated
- `valet link` and `valet secure`, pick a nicer custom testing url else it will dist.test
- `npx vite build -w` to watch the changes while developing

# Caveat
- Valet Nginx don't really like independent SPA without Laravel router to catch all, current workaround is to turn off the valet original `location /` directive then replace with this, then 404 won't work
    ```
    location / {
        root /Users/kentliau/Developer/standard/client/web/vue-web-client/dist; # Absolute path to the index.html
        try_files $uri $uri/ /index.html;
    }
    ```
- Vite's ESLint plugin don't really work

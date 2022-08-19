# Caveat
- [ ] Valet Nginx don't really like independent SPA without Laravel router to catch all
    - current workaround, need to turn off the valet original `location /` directive then replace with this
    ```
        location / {
            root /Users/kentliau/Developer/standard/client/web/vue-web-client/dist; # Absolute path to the index.html
            try_files $uri $uri/ /index.html;
        }
    ```

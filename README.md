Run all services in Docker
```bash
docker compose up -d
```

Apply migrations
```bash
docker exec yii2-advanced-template-frontend-1 /bin/bash -c "yes yes | yii migrate"
```

In browser
```
http://localhost:20080/
```

In order to access frontend functionality, sign up is necessary. Application is tweaked to automatically activate all new users, so no email activation is required.


**(!WARNING: successful sign up deos not automatically redirect to login for some reason. Go to Login manually after registering.)**

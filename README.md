## Note

### Running the application 
This application is using cookie based authentication and both frontend and backend should be in same top level domain.
If you are running the backend in localhost:8000 so the frontend should be in localhost:3000.

If you want to run the backend in a different url you need to change the url in the src/api/clients.ts file.

### Running the backend
Backend is in laravel, and it uses docker to run.
1. First you need to copy .env.example to .env
```bash
cp .env.example .env
```

2. Second you need to install make, docker and docker-compose.
3. Then you need to run the following command to set up the backend.
```bash
make setup
```

You can find the rest commands in Makefile

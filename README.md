# Challenge

## O que é?
Refere-se a uma api simples para enviar transações bancárias entre contas de usuários e lojas.


## Instalação

```bash
git clone https://github.com/fernandacipriano/challenge.git
cd challenge
```
# Subindo containers
```bash
docker-compose up --build -d
```

# Acessando container php
```bash
docker-compose exec app bash
```
# Execução do composer
```bash
composer install
```
# Executando migrations e alimentando o banco
```bash
php artisan migrate:fresh --seed
```


### Configuração

```sh
# copy both files and make changes to them if needed
cp .env.docker.example .env
cp .env.app.example images/php/app/.env
```

## Requisições

No Insomnia ou outro de sua prefência, pode-se acessar cada método abaixo:

---
- /api/user [GET]
    - Lista todos os usuários

- /api/user [POST]
    - Cria um novo usuário
    ```json
    {
        "name": "Alegria",
        "email": "alegria@mail.com",
        "identity": "123456",
        "password": "654321",
        "balance": 500,
        "type": "COMMOM"
    }
    ```
- /api/user/{id} [GET]
    - Traz os dados do usuário com o id requisitado

- /api/transaction [GET]
    - Traz todas as transações existentes no banco de dados

- /api/transaction [POST]
    - Efetua uma transação
    ```json
    {
        "payer": 1,
        "payee": 2,
        "amount": 10
    }
    ```

### Parando os containers

```bash
docker-compose down
```

## Executando comandos artisan

```sh
docker-compose exec php sh
# dentro do container
cd ..
php artisan migrate
php artisan cache:clear
```

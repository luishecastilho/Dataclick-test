
# Teste Data Click

Segue abaixo o passo a passo para instalação do projeto.


## Instalação

Instale as dependencias

```
  composer install
  npm install
```    

## Banco de dados

#### Estrutura

Para gerar a estrutura do BD:
```cmd
    php artisan migrate
```

#### Dados

Para gerar dados aleatórios no BD:
```cmd
    php artisan db:seed
```
## Run

Para rodar o projeto e testar

```bash
  php artisan serve
  npm run dev
```

http://127.0.0.1:8000/

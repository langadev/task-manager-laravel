# 📋 Task Manager

[![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?style=flat-square&logo=laravel)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?style=flat-square&logo=php)](https://www.php.net/)
[![Docker](https://img.shields.io/badge/Docker-Sail-2496ED?style=flat-square&logo=docker)](https://laravel.com/docs/sail)
[![License](https://img.shields.io/badge/License-MIT-green.svg?style=flat-square)](LICENSE)

Um gestor de tarefas simples, eficiente e profissional, desenvolvido com **Laravel 11**, **Tailwind CSS** e **Docker Sail**, seguindo as melhores práticas de desenvolvimento.

## ✨ Funcionalidades

- **CRUD completo** de tarefas (Criar, Editar, Visualizar, Eliminar)
- **Organização por categorias** com cores personalizadas
- **Pesquisa e filtros avançados** (por estado ou categoria)
- **Autenticação segura** de utilizadores
- **Interface responsiva** e moderna
- **Testes automatizados** para qualidade garantida
- **Segurança** com validação de dados e proteção CSRF

##  Tecnologias Utilizadas

### Backend
- [Laravel 11](https://laravel.com/) — Framework PHP robusto
- [PHP 8.3](https://www.php.net/) — Runtime moderno
- [MySQL](https://www.mysql.com/) — Base de dados relacional

### Frontend
- [Blade](https://laravel.com/docs/11.x/blade) — Template engine
- [Tailwind CSS](https://tailwindcss.com/) — CSS framework moderno
- [Vite](https://vitejs.dev/) — Build tool rápido

### Ambiente & DevOps
- [Docker](https://www.docker.com/) — Containerização
- [Laravel Sail](https://laravel.com/docs/11.x/sail) — Orquestração simplificada

##  Como executar o projeto

### Pré-requisitos

Certifique-se de ter instalado:

- [Docker Desktop](https://www.docker.com/products/docker-desktop/) — Para containers
- [Git](https://git-scm.com/) — Para clonar o repositório

### Passo a passo

#### 1️⃣ Clone o repositório

```bash
git clone https://github.com/langadev/task-manager-laravel.git
cd task-manager-laravel
```

#### 2️⃣ Instale as dependências com Docker

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

#### 3️⃣ Inicie os containers

```bash
./vendor/bin/sail up -d
```

#### 4️⃣ Configure a aplicação

```bash
# Gere a chave da aplicação
./vendor/bin/sail artisan key:generate

# Execute as migrations e seeders
./vendor/bin/sail artisan migrate --seed
```

#### 5️⃣ Instale as dependências frontend

```bash
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

#### 6️⃣ Acesse a aplicação

Abra o navegador e acesse: **http://localhost**

##  Comandos Úteis

| Comando | Descrição |
|---------|-----------|
| `./vendor/bin/sail up -d` | Iniciar os containers |
| `./vendor/bin/sail down` | Parar os containers |
| `./vendor/bin/sail artisan test` | Executar testes |
| `./vendor/bin/sail npm run dev` | Build assets em desenvolvimento |
| `./vendor/bin/sail npm run build` | Build otimizado para produção |
| `./vendor/bin/sail artisan migrate:fresh --seed` | Reset da base de dados |
| `./vendor/bin/sail tinker` | Console interativo do Laravel |
| `./vendor/bin/sail logs -f` | Ver logs em tempo real |

##  Estrutura do Projeto

```
app/
├── Http/
│   ├── Controllers/        # Controladores de negócio
│   └── Requests/           # Validação de formulários
├── Models/                 # Eloquent Models
├── Policies/               # Autorização granular
└── Providers/              # Service Providers

database/
├── migrations/             # Schema do banco de dados
├── factories/              # Model factories para testes
└── seeders/                # Dados de teste

resources/
├── views/                  # Blade templates
├── css/                    # Tailwind CSS
└── js/                     # JavaScript/Vite

routes/
├── web.php                 # Rotas web
└── auth.php                # Rotas de autenticação

tests/
├── Feature/                # Testes de funcionalidade
└── Unit/                   # Testes unitários
```

##  Testes

Execute os testes automatizados:

```bash
# Rodar todos os testes
./vendor/bin/sail artisan test

# Rodar testes com cobertura
./vendor/bin/sail artisan test --coverage

# Rodar testes específicos
./vendor/bin/sail artisan test tests/Feature/TaskTest.php
```

##  Licença

Este projeto está licenciado sob a [MIT License](LICENSE).

##  Autor

Desenvolvido com  por **Alfredo Valente Langa**

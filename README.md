# Task Manager

Um gerenciador de tarefas moderno, elegante e funcional, construído com **Laravel**, **Tailwind CSS** e **Docker (Sail)**.


## Funcionalidades

-   **Gestão de Tarefas (CRUD)**: Criação, edição, visualização e exclusão de tarefas.
-   **Categorias Personalizadas**: Organize as suas tarefas com categorias que possuem cores únicas.
-   **Sistema de Filtros Inteligente**:
    *   Pesquisa por título em tempo real.
    *   Filtro por status (Pendente / Concluída).
    *   Filtro por categoria.
-   **Interface Premium**:
    *   Design Responsivo.
-   **Autenticação**: Sistema seguro de login e registro via Laravel Breeze.

##  Tecnologias Utilizadas

-   [Laravel 11](https://laravel.com/)
-   [Laravel Sail](https://laravel.com/docs/sail) (Docker)
-   [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze)
-   [Tailwind CSS](https://tailwindcss.com/)
-   [MySQL](https://www.mysql.com/)
-   [Vite](https://vitejs.dev/)

## 🛠️ Como Rodar o Projecto

Este projeto utiliza o **Laravel Sail**, o que significa que não precisa de instalar PHP, MySQL ou Node.js localmente, apenas o **Docker Desktop**.

### 1. Clonar o Repositório
```bash
git clone git@github.com:langadev/task-manager-laravel.git
cd todo-list
```

### 2. Instalar Dependências do PHP
Como o projeto está num container, pode usar o seguinte comando para instalar as dependências sem ter o PHP na sua máquina:
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

### 3. Configurar Variáveis de Ambiente
```bash
cp .env.example .env
```

### 4. Iniciar o Docker (Sail)
```bash
./vendor/bin/sail up -d
```

### 5. Configurar a Aplicação
Execute os comandos dentro do container do Sail:
```bash
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed
```

### 6. Instalar e Compilar Assets (Frontend)
```bash
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

Agora, basta aceder a `http://localhost` no seu navegador.

## Comandos Úteis

-   **Parar o projeto**: `./vendor/bin/sail stop`
-   **Rodar testes**: `./vendor/bin/sail artisan test`
-   **Aceder ao Tinker**: `./vendor/bin/sail artisan tinker`

---
Desenvolvido por [Langa Dev](https://github.com/langadev). 🚀

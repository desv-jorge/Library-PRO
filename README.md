<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 📚 Library PRO

Sistema de Gestão de Biblioteca desenvolvido como projeto de estudo focado em **Clean Code**, **SOLID** e **Arquitetura Laravel Moderna**. O objetivo principal foi aplicar as melhores práticas de desenvolvimento, segurança e manutenibilidade.

## 🚀 Funcionalidades

### Autenticação & Segurança (Laravel Breeze)

* [x] Login, Registro e Logout seguros.
* [x] Proteção CSRF em todos os formulários.
* [x] Validação de dados via **Form Requests** dedicados.



### Gestão de Autores (CRUD)

* [x] Cadastro completo de autores.
* [x] Listagem com paginação.
* [x] Edição e Exclusão (com integridade referencial).

### Gestão de Livros (CRUD Relacional)

* [x] Cadastro de livros vinculados a autores (Relação 1:N).
* [x] Controle de Status via **PHP 8.1 Enums** (`Available`, `Borrowed`, etc).
* [x] Validação de ISBN único (com exceção inteligente na edição).
* [x] Prevenção de problemas de performance (N+1 Queries) usando Eager Loading.



### Interface (Frontend)

* [x] Layout responsivo com Sidebar lateral.
* [x] Estilização via **Tailwind CSS**.
* [x] Uso de **Blade Components** para reaproveitamento de código.


* [x] Feedback visual (Flash Messages) para ações de sucesso/erro.

---

## 🛠️ Tecnologias e Padrões Utilizados

Este projeto segue rigorosamente os padrões da comunidade Laravel e PSR-12:

* **Linguagem:** PHP 8.2+ (com `declare(strict_types=1)`).
* **Framework:** Laravel 10/11.
* **Banco de Dados:** MySQL 8.0.
* **Ambiente:** Docker & Laravel Sail (Isolamento total de ambiente).
* **Design Patterns:**
* **MVC Rigoroso:** Controllers magros, lógica delegada.
* **Type Safety:** Uso extensivo de tipagem forte e Enums.
* **Repository/Service Mindset:** Lógica de validação isolada em FormRequests.



---

## 🔧 Como Rodar o Projeto

Este projeto utiliza **Laravel Sail** (Docker), o que significa que você não precisa ter PHP ou Composer instalados na sua máquina local, apenas o Docker.

### Pré-requisitos

* [Docker Desktop](https://www.docker.com/products/docker-desktop) instalado e rodando.
* Git.

### Passo a Passo

1. **Clone o repositório**
```bash
git clone https://github.com/desv-jorge/Library-PRO.git
cd library-pro

```


2. **Configure as Variáveis de Ambiente**
Faça uma cópia do arquivo de exemplo para o arquivo real.
```bash
cp .env.example .env

```


3. **Instale as dependências (Via Container)**
Este comando baixa uma imagem temporária apenas para instalar as pastas do vendor.
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs

```


4. **Suba o Ambiente (Sail)**
```bash
./vendor/bin/sail up -d

```


5. **Gere a Chave da Aplicação e Migre o Banco**
```bash
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate:fresh --seed

```


> **Nota:** O comando `--seed` irá criar um usuário padrão para testes.


6. **Acesse a Aplicação**
Abra seu navegador em: `http://localhost`

---

## 👤 Usuário de Teste (Seeder)

Ao rodar as migrations com seed, o seguinte usuário é criado automaticamente:

* **Email:** `admin@example.com`
* **Senha:** `password`

---

## 🧪 Estrutura de Pastas Importante

Para facilitar a navegação pelo código:

* `app/Models`: Modelos Eloquent com Casts e Relacionamentos configurados.
* `app/Http/Controllers`: Controladores "Magros" apenas orquestrando fluxo.
* 
`app/Http/Requests`: Toda regra de validação reside aqui (Clean Code).


* `app/Enums`: Definições de status (Type Safety).
* `resources/views/components`: Componentes Blade reutilizáveis.

---

## 💡 Dicas de Desenvolvimento (Alias)

Para evitar digitar `./vendor/bin/sail` toda vez, adicione este alias ao seu terminal:

```bash
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'

```

Agora você pode usar comandos curtos:

```bash
sail artisan migrate
sail composer require ...

```

---

## 📄 Licença

Este projeto está sob a licença [MIT](https://opensource.org/licenses/MIT).
# gestao-financeira-php
Sistema de gestão financeira, desenvolvido em PHP com arquitetura moderna.

## 🚀 Características

- **Arquitetura MVC** com Repository Pattern
- **Autenticação segura** com hash de senhas
- **Design moderno** e responsivo
- **Validação robusta** de dados
- **Boas práticas** de segurança
- **PSR-4** Autoloading

## 📋 Pré-requisitos

- PHP 8.0+
- MySQL 5.7+
- Composer
- Apache com mod_rewrite

## 🔧 Instalação

1. **Clone o repositório**
```bash
git clone <url-do-repo>
cd gestao-financeira-php
```

2. **Instale as dependências**
```bash
composer install
```

3. **Configure o banco de dados**
   - Crie um banco chamado `financeiro`
   - Configure as credenciais no arquivo `.env`

4. **Execute o setup**
```bash
php setup.php
```

5. **Acesse a aplicação**
```
http://localhost/gestao-financeira-php/public/
```

## 🎯 Funcionalidades Implementadas

### Sistema de Login
- [x] Registro de usuários
- [x] Login com validação
- [x] Hash seguro de senhas
- [x] Gerenciamento de sessões
- [x] Logout
- [x] Design moderno e responsivo

## 🏗️ Estrutura do Projeto

```
app/
├── Controllers/     # Controladores da aplicação
├── Core/           # Classes principais (Router)
├── Models/         # Modelos de dados
├── Repositories/   # Camada de acesso a dados
├── Services/       # Lógica de negócio
└── Views/          # Templates HTML

config/
└── Database.php    # Configuração do banco

public/
├── index.php       # Ponto de entrada
└── .htaccess       # Configurações Apache

database/
└── users.sql       # Script de criação das tabelas
```

## 🔐 Segurança

- Senhas com hash usando `password_hash()`
- Validação de entrada com `filter_input()`
- Escape de saída com `htmlspecialchars()`
- Headers de segurança configurados
- Prepared statements para SQL

## 📱 Design

- Interface moderna com gradientes
- Totalmente responsivo
- Ícones Font Awesome
- Animações suaves
- UX intuitiva

Atividade Somativa da Materia Programação Web de PUCPR - Pontifícia Universidade Católica do Paraná

# Biblioteca Online

## Descrição

A Biblioteca Online é uma aplicação web que permite gerenciar uma coleção de livros. Os usuários podem se registrar, fazer login e, uma vez autenticados, podem adicionar, editar e excluir livros da coleção. O projeto utiliza tecnologias como HTML, CSS, JavaScript, PHP e MySQL, juntamente com o framework CSS Bootstrap.

## Funcionalidades

- Registro de usuário
- Autenticação de usuário (login e logout)
- CRUD de livros (criação, leitura, atualização e exclusão)
- Interface padronizada com Bootstrap

## Requisitos

- PHP 7.4 ou superior
- MySQL 5.7 ou superior
- Servidor web (Apache, Nginx, etc.)

## Instalação

1. Clone o repositório para o seu servidor local:

   ```bash
   git clone https://github.com/tnuth-moreira/biblioteca_online-PHP-
   cd biblioteca-online
   ```

2. Crie o banco de dados e as tabelas necessárias:

   ```sql
   CREATE DATABASE biblioteca_online;

   USE biblioteca_online;

   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(50) NOT NULL UNIQUE,
       password VARCHAR(255) NOT NULL
   );

   CREATE TABLE authors (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100) NOT NULL
   );

   CREATE TABLE books (
       id INT AUTO_INCREMENT PRIMARY KEY,
       title VARCHAR(100) NOT NULL,
       description TEXT NOT NULL,
       author_id INT,
       FOREIGN KEY (author_id) REFERENCES authors(id)
   );
   ```

3. Configure a conexão com o banco de dados no arquivo `config.php`:

   ```php
   <?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "biblioteca_online";


   $conn = new mysqli($servername, $username, $password, $dbname);


   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   ?>
   ```

4. Coloque todos os arquivos do projeto no diretório raiz do seu servidor web.

5. Acesse a aplicação no seu navegador através do endereço `http://localhost/biblioteca-online`.

## Estrutura do Projeto

- `index.html`: Página inicial da aplicação.
- `login.php`: Página de login de usuário.
- `register.php`: Página de registro de novo usuário.
- `dashboard.php`: Página de dashboard do usuário autenticado, onde são listados os livros.
- `add_book.php`: Página para adicionar um novo livro.
- `edit_book.php`: Página para editar um livro existente.
- `delete_book.php`: Script para excluir um livro.
- `config.php`: Configurações de conexão com o banco de dados.

## Tecnologias Utilizadas

- HTML
- CSS (Bootstrap)
- JavaScript
- PHP
- MySQL

## Contribuição

Se você deseja contribuir para este projeto, siga os passos abaixo:

1. Fork este repositório.
2. Crie uma branch com a sua feature (`git checkout -b minha-feature`).
3. Comite suas mudanças (`git commit -m 'Adiciona minha feature'`).
4. Faça o push para a branch (`git push origin minha-feature`).
5. Abra um Pull Request.

## Autor

- Thiago Nuth Moreira - [tnuth-moreira](https://github.com/tnuth-moreira)

# Aplicação OneSight

Bem-vindo à aplicação OneSight! Esta aplicação é um exemplo de aplicação web desenvolvida em Symfony 6 e possui recursos para gerenciamento de participantes, gráficos de entregas, envio de e-mails e muito mais.

## TODO List

- Usuário
  1. [x] **Criar**
  2. [x] **Autenticar**
- Avaliação
  1. [x] Enviar Avaliação
  2. [x] Timer
- Painel Admin
  1. [ ] Implementar um painel administrativo seguro para gerenciar recursos da aplicação
  2. [ ] Adicionar um mecanismo para definir e aplicar datas limite para inscrições.
  - **Gerenciamento de Participantes**
    1. [ ] Criar um sistema para adicionar, editar e remover participantes
    2. [ ] Implementar gráficos para mostrar quantas entregas foram realizadas ao longo do tempo.
- Integração AWS SES para Envio de E-mail
  1. [ ] Configurar a integração com o serviço Amazon SES para enviar e-mails automáticos.
  2. [ ] Implementar um sistema de feedback para avaliar o desempenho dos testes.
  3. [ ] Enviar e-mails para os desenvolvedores com feedback.
- Docker
  1. [ ] Implementar

## Dependências

- PHP >= 8.1
- Symfony Framework >= 6.3
- MySQL >= 5.7
- Composer >= 2.5.4
- node = v16.16.0

## Passo-a-passo - Instalação

1. Em sua pasta raiz, clone o arquivo do projeto usando **git clone** https://github.com/WelderOliveira/BD-PROJECT-2023-1.git
2. Abra o terminal (bash / cmd). Em seguida, vá para a pasta do projeto usando o comando

```sh
cd BD-Project-2023-1
```

3. Em seguida, instale os arquivos e bibliotecas necessários usando

```sh
composer install
```

4. Em seguida, compile todos os arquivos CSS e JS usando este comando

```sh
npm install && npm run dev
```

ou

```sh
yarn install && yarn run dev
```
5. Crie um banco de dados em MYSQL e conecte-o ao seu projeto por meio do arquivo `.env`.

```sh
DATABASE_URL="mysql://USER:PASSWORD@HOST:3306/DBNAME?serverVersion=8.0.32&charset=utf8mb4"
```

6. Após conectar o banco de dados com o projeto, execute o comando

```sh
php bin/console doctrine:migrations:migrate
```

7. Finalmente, estamos prontos para executar este projeto, utilize este comando

```sh
symfony server:start
```

### Acesse através do IP apresentado no prompt.


## Contribuições

Contribuições são bem-vindas! Se você encontrar bugs, melhorias ou novos recursos que gostaria de adicionar, sinta-se à vontade para abrir um pull request.

## Contato

Se você tiver alguma dúvida ou precisar de ajuda, entre em contato através do linkedin: https://www.linkedin.com/in/welderoliveira/.

# Atividade
Desenvolver uma view para visualizar dados de usuários e seus acessos.

### Requisitos
```
git, docker, docker-compose
```

### Instalação

Após ter todos os requisitos instalados na sua máquina, acesse o console do seu computador como administrador e siga os seguintes passos.

1. ``git clone https://github.com/jocielthiago/jociel_teste.com.br.git``.
2. ``cd jociel_teste.com.br/laradock``. Entre na pasta
3. ``docker-compose up -d nginx mysql phpmyadmin``. Inicia a aplicação e o banco de dados.Pode ocorrer de demoar para concluir o carregamento da aplicação caso seja a sua primeira vez usando Docker.
Dentro do diretório do projeto, rode estes comandos:
4. ``docker exec -it jociel_thiago_teste_workspace_1 php artisan key:generate``. Gera uma Chave Unica.
5. ``docker exec -it jociel_thiago_teste_workspace_1 php artisan migrate --seed``. Cria as tabelas e preenche com dados fakes.

#### Após realizar todos os passos anteriores, acesse [http://localhost:8121](http://localhost:8121) para abrir a aplicação no seu navegador.


#### Para acessar o PhpMyAdmin, utilize [http://localhost:8123](http://localhost:8123) no seu navegador, 
1. ``server : mysql`` 
2. ``user: default``
3. ``password : secret``

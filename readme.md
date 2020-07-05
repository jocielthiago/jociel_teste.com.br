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
6. ``docker-compose up -d nginx mysql phpmyadmi``. Inicia a aplicação e o banco de dados.\
Dentro do diretório do projeto, rode estes comandos:
7. ``docker exec -it jociel_thiago_teste_workspace_1 php artisan key:generate``. Gera uma Chave Unica.
7. ``docker exec -it jociel_thiago_teste_workspace_1 php artisan migrate --seed``. Cria as tabelas e preenche com dados fakes.

#### Após realizar todos os passos anteriores, clique [aqui](http://localhost:8121) para abrir a aplicação no seu navegador.


#### para acessar o PhpMyAdmin, clique [aqui](http://localhost:8123), 
1. ``host : mysql`` 
1. ``user: default``
1. ``password : secret``

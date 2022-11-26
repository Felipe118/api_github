# API_GITHUB
API do GitHub para listar e mostrar informações sobre meus repositórios

## INSTALAR O PROJETO NA SUA MAQUINA
1 - clone o projeto : ``git clone https://github.com/Felipe118/api_github.git``

2 - Entrar na pasta public - ``cd public``

3 - Após entrar na pasta public execulte o comando para utilziar o servidor embutido do PHP - ``php -S localhost:8181``

4 - Abra o navegador e utilze os endpoints lista logo em baixo: ex - `localhost:8181/all-repos`

## ENDPOINTS

1 - `/all-repos` - Esse endpoint lista todos os meus repositórios e suas informações  <br>

2 - `all-repos-name` -  Esse endpoint lista o nome de todos os meus repositorios <br>

3 - `/repo/{nome-do-repo}` -  Esse endpoint traz informações sobre um repositório ex: `localhost:8181/repo/api_desapegar` <br>

4 - `/repo-commit-date/{nome-do-repo}` - Esse endpoint lista os repositórios de acordo com a datas mais recentes ex: `localhost:8181/repo-commit-date/api_desapegar` <br>

5 - `/repo-commit-alphabetic/{nome-do-repo}` - Esse endpoint lista os commits em ordem alfabética de um repositório ex: `localhost:8181/repo-commit-alphabetic/api_desapegar` <br>

6 - `/repo-words/{word-search}` - Esse endpoint lista repositórios de acordo com palavras especificas ex: `localhost:8181/repo-words/php`
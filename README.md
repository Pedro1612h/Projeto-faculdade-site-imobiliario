<a href="https://pedro1612h.github.io/Projeto-faculdade-site-imobiliario/docs/">Site</a><br>
 

Descrição do Projeto

Este é um projeto acadêmico que consiste no desenvolvimento de um site imobiliário completo. O objetivo é criar uma aplicação web para exibição, cadastro e gerenciamento de imóveis, com funcionalidades tanto para usuários finais quanto para administradores. O projeto contempla o front-end, back-end e integração com um banco de dados.

Funcionalidades

Usuário Final:
Pesquisa de imóveis por localização, tipo, preço, etc.
Visualização detalhada de cada imóvel.
Cadastro/login para salvar imóveis favoritos.
Contato direto com o anunciante via formulário.

Administração:
Cadastro e gerenciamento de imóveis.
Edição de informações dos imóveis.
Controle de usuários cadastrados.
Painel com estatísticas de acessos e imóveis cadastrados.
Tecnologias Utilizadas

Front-End:
HTML5: Estrutura das páginas.
CSS3: Estilização responsiva e moderna.

JavaScript: Funcionalidades dinâmicas.
React.js: Biblioteca para criação de interfaces interativas.

Back-End:
Node.js: Gerenciamento do servidor e APIs.
Express.js: Framework para facilitar a criação das rotas.
Autenticação: JWT (JSON Web Tokens) para login seguro.

Banco de Dados:
XAMPP: Armazenamento das informações de usuário que querem anunciar seus imóveis e de contatar um corretor, armazenando email, nome, descrição, valor e imagem do imovel

Estrutura do Projeto
Detalhamento dos Processos
Front-End
Estruturação (HTML5):

Criação de páginas como Home, Login, Cadastro, Detalhes do Imóvel, Contate um corretor e calculadora de financiamento.
Estilização (CSS3)

Uso de Flexbox e Grid para layouts responsivos.

Interatividade (React.js):

Componentes reutilizáveis para formulários, cards de imóveis e menus.
Gerenciamento de estado com Context API.
Integração com a API via Axios.
Back-End
Servidor (Node.js + Express.js):

Configuração do servidor para escutar requisições HTTP.
Criação de rotas RESTful para CRUD de imóveis, autenticação de usuários e gerenciamento.
Autenticação (JWT):

Proteção de rotas administrativas e autenticação de usuários.
Validações e Segurança:

Middleware para validação de dados recebidos.
Sanitização de entradas para evitar injeção de código.
Banco de Dados
Estrutura das Coleções (MongoDB):

Usuários: Contém informações pessoais, login e favoritos.
Imóveis: Armazena detalhes dos imóveis como preço, localização e descrição.
Relacionamento:

Relacionamento entre usuários e seus imóveis favoritos.
Mongoose:

Schemas bem definidos para facilitar validações e interações.
Instalação e Execução
Pré-requisitos
Node.js e npm instalados.
MongoDB configurado localmente ou em um serviço na nuvem (como Atlas).
Passos:
Clone este repositório:

git clone https://github.com/seu-repositorio.git
cd seu-repositorio
Instale as dependências:

cd front-end
npm install
cd ../back-end
npm install
Configure as variáveis de ambiente no arquivo .env:

MONGO_URI=mongodb://localhost:27017/imobiliario
JWT_SECRET=sua_chave_secreta
Execute o servidor back-end:

cd back-end
npm start
Execute o front-end:

cd front-end
npm start
Acesse o site em localhost

Implementar integração com mapas (Google Maps API).
Contribuição
Sinta-se à vontade para contribuir enviando pull requests ou relatando problemas!

Autore:

Miguel Ramin - 2024 0241 0628;

Luís Fernando da Silva Rodrigues Barbosa - 2024 0394 5355;

Lucas do Nascimento Ferreira de Souza - 2024 0302 7127;

Pedro Henrique Carnieli Moreira - 2024 0239 2581:

Faculdade: Unimetrocamp

Disciplina: Desenvolvimento Web.

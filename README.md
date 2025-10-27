<div align="center">
  <img src="public/img/logo-ifsync.png" width="400" alt="Logo IFSync">
</div>

### IFSync — Branch Pública (Hospedagem Temporária)
Objetivo desta branch: disponibilizar apenas o necessário para a existência e visualização do site, sem integração com banco de dados, permitindo que o professor hospede o sistema e navegue pelas telas principais.

---

## Contexto
O projeto completo IFSync ainda está em desenvolvimento. Criamos uma branch pública apenas para hospedagem e visualização das principais telas do sistema. Essa branch contém apenas:
• landing.blade.php — Página inicial (funciona como index.html)
• Tela de Login
• Tela do Menu Principal

A autenticação está temporariamente desativada, pois o banco de dados não será
importado no ambiente do professor. Ao clicar no botão “Login”, independente dos campos preenchidos, o usuário é redirecionado automaticamente para o menu principal. Essa configuração é intencional — feita apenas para demonstrar o layout e o fluxo de navegação.

---

## Estrutura e comportamento atual
• Front-end em Blade (Laravel), com navegação simulada
• Sem dependência de banco de dados ou autenticação real
• Fluxo esperado:
1. O acesso inicial ocorre via landing.blade.php (página principal)
2. O usuário é direcionado à tela de Login
3. Ao clicar em “Login”, é levado ao Menu Principal

---

## Branch pública
Nome da branch pública: public (https://github.com/nadineeev/IFSync/tree/public).
Como obter os arquivos:
Via Git:
git clone https://github.com/nadineeev/IFSync
cd IFSync
git checkout public
Ou baixando diretamente:
1. Acesse o repositório no GitHub: IFSync
2. Troque para a branch "public".
3. Clique em Code -> Download ZIP e extraia o conteúdo.

---

## Como hospedar no servidor do professor (ambiente PHP)
O professor possui um plano de hospedagem próprio — portanto, o ambiente já possui suporte a PHP e está pronto para rodar o Laravel de forma básica. Abaixo o passo a passo:

#1 Envio dos arquivos
1. Acesse o gerenciador de arquivos ou FTP do servidor (ex.: via cPanel, Hostinger, etc.)
2. Envie todo o conteúdo desta branch pública para o diretório public_html/ ou www/.
3. Certifique-se de que o arquivo landing.blade.php esteja acessível (geralmente em /resources/views/).
Dica: Se o servidor não tiver o Laravel completo instalado, mantenha apenas os arquivos necessários (HTML/CSS/JS). Não é preciso configurar .env nem o banco.

#2 Configuração inicial (opcional)
Se desejar executar o Laravel de forma tradicional:
php artisan serve
Depois acesse http://seudominio.com.
Se o servidor já estiver configurado para PHP (como na maioria dos planos), basta acessar o domínio — a landing page (landing.blade.php) será exibida automaticamente.

#3 Testar o fluxo
1. Abra o domínio hospedado.
2. A tela inicial deve ser a landing page.
3. Clique em Login -> o sistema redirecionará para o Menu Principal.
4. Navegue pelas telas para testar o layout e o fluxo.


---

## Orientações ao professor
• Fazer o deploy somente desta branch pública
• Hospedar no servidor próprio (plano pago)
• Não configurar banco de dados, autenticação ou rotas dinâmicas
• Garantir que o site abra pela landing page (landing.blade.php)
• O fluxo de login já está ajustado para redirecionar automaticamente ao menu principal.

## Importante
• A autenticação está desativada propositalmente.
• Nenhum dado é armazenado (sem banco de dados).
• Não reativar o middleware de autenticação nem o .env.
• Esta versão é apenas para demonstração da interface e fluxo visual.

## Próximos passos
• Reativar autenticação Laravel com banco.
• Implementar módulos estudantis: agenda, frequência, notas e calendário.
• Integrar dashboards e funcionalidades reais.
• Publicar versão completa após teste
# 📊 Relatório Criação de Sistema de Gerenciamento de Vendas e Estoque

![Logo ChocoArte](https://github.com/user-attachments/assets/8d7811ce-1830-4f3f-9342-89459bcb6ac8) 

Figura 1 - Logo Choco Arte

---

## :memo: Visão Geral
### :climbing: O Desafio
Conceber e desenvolver um protótipo de software para automatizar e otimizar o processo de vendas e controle de estoque da empresa Choco Arte. 

O desafio central deste projeto é criar a prototipação do sistema de gerenciamento de vendas e estoque da Choco Arte, que atualmente faz toda a gestão de forma manual. Há diversas melhorias que podem ser aplicadas ao método atual utilizado pela empresa, visando torná-lo mais eficiente para seus usuários e aumentando a produtividade e eficácia nas operações cotidianas. 

Neste cenário, é necessário:
- **Análise de Stakeholders:** Identificar e entender as necessidades, expectativas, interesses e influência de cada stakeholder no desenvolvimento do projeto.
- **Levantamento de Requisitos:** Realizar o levantamento de quais requisitos funcionais e não funcionais são necessários para a criação do sistema dentro das necessidades da Choco Arte.
- **Criação de Protótipos:** A prototipação permitirá que o cliente visualize as funcionalidades disponíveis no sistema.

### :jigsaw: Contexto
Atualmente, a Choco Arte não conta com um sistema digital para gestão de vendas e estoque, o que é feito manualmente, resultando em dificuldades no controle de entrada e saída de produtos, além de falhas no registro de vendas e na previsão de faturamento. 

---

## :mag: Why?
### :people_holding_hands: Quem utilizará o sistema?
O sistema será utilizado exclusivamente pelos proprietários da Choco Arte e os funcionários, não sendo acessado diretamente pelos clientes.

#### :mag: Quais seriam os problemas?
Como a gestão das vendas e do estoque dos produtos acontece de forma manual, o controle das entradas e saídas fica dificultado, tornando o processo de gestão da empresa mais moroso e aumentando a possibilidade de erros.

### :book: Storytelling
Em um dia típico na vida de Arthur, um jovem de 22 anos, da cidade de Teixeiras – MG, que estuda Análise e Desenvolvimento de Sistemas, o equilíbrio entre suas atividades diárias era um desafio constante. Além dos estudos, Raphael dedicava seu tempo à sua pequena empresa de doces, conciliando isso com sua paixão por esportes e lazer com a família, a namorada e os amigos, especialmente durante os jogos de vôlei nos finais de semana.

[História completa do Storytelling...]

---

## :busts_in_silhouette: Who - Análise dos Stakeholders
### :bust_in_silhouette: Persona
![Brown and Cream Minimalist User Persona Poster (1)](https://github.com/user-attachments/assets/c0bea6ae-8d0f-48de-b58f-1abbf9a1c20c) Figura 2 - Persona

#### :thought_balloon: Mapa de Empatia
![Mapa de Empatia (1)](https://github.com/user-attachments/assets/68e28d83-0419-4cee-87d8-334226f08288) Figura 3 - Mapa de Empatia

---

## :gear: Engenharia de Requisitos

## :memo: Elicitação de Requisitos

Em reunião com o cliente, identificamos as principais necessidades que o sistema deverá atender. Elas incluem:
- Controle de estoque;
- Alerta de baixa estoque;
- Cadastro de produtos;
- Controle de caixa (fechamento de caixa, dentre outros);
- Emissão de notas.
- Gerador de relatórios 
- Gestão de usuários

---

## :page_with_curl: Especificação de Requisitos

# 📋 Requisitos do Sistema

# 📋 Requisito 1: Controle de Estoque
 - 🆔 ID: REQ-001
 - 📝 Descrição: O sistema deve permitir o acompanhamento em tempo real do estoque.
 - 📑 Detalhamento:

A interface de consulta deve ser intuitiva e oferecer a opção de exportação dos dados para relatórios em formatos como CSV ou PDF.
O sistema deve permitir a atualização automática do estoque após cada movimentação registrada.
O usuário deve ser capaz de consultar a quantidade disponível de cada item existente no estoque.  
O sistema deve exibir todas as movimentações dos produtos (entradas e saídas).
Deve ser possível visualizar um histórico detalhado de movimentações, com capacidade de filtragem por data, produto e tipo de operação (entrada/saída).
- 📌 Justificativa: Permite a gestão eficiente do estoque, evitando perdas e otimizando o controle dos produtos disponíveis.
- 🔺 Prioridade: Alta

---

# 📋 Requisito 2: Alerta de Baixa de Estoque
- 🆔 ID: REQ-002
- 📝 Descrição: O sistema deve emitir alertas automáticos quando o nível de estoque de qualquer produto atingir ou estiver abaixo de um valor mínimo definido.

- 📑 Detalhamento:
O sistema deve permitir a visualização de relatórios de produtos com estoque baixo, podendo ser filtrado por data e categoria.


O alerta também pode ser configurado para ser exibido de 1 em 1 hora quando a quantidade disponível de um produto alcançar quantidade inferior à estabelecida ou zero.
O sistema deve permitir gerar um relatório dos itens com estoque baixo para que os responsáveis pela reposição de estoque possam facilmente visualizar os itens e tomar as devidas providências.
O sistema deve permitir a configuração de valores mínimos de estoque por produto.
O alerta deve ser enviado por e-mail e/ou exibido dentro do sistema.


- 📌 Justificativa: Garantir a reposição de produtos e evitar rupturas de estoque.
- 🔺 Prioridade: Média

---

# 📋 Requisito 3: Cadastro de Produtos
- 🆔 ID: REQ-003
- 📝 Descrição: O sistema deve possibilitar o cadastro, consulta, edição e exclusão de produtos.


- 📑 Detalhamento:

O sistema deve permitir a edição de qualquer dado do produto após o cadastro, mantendo histórico das modificações.

O sistema deve permitir a exclusão de produtos, mas com a devida confirmação e restrição se o produto já estiver associado a transações anteriores.

Deve ser possível realizar buscas rápidas por nome, código ou categoria.

O sistema deve permitir a importação em massa de produtos via arquivo CSV ou Excel.

As seguintes informações são obrigatórias no cadastro de produto:
Nome do produto.
Código do produto (SKU ou outro identificador único).
Descrição detalhada.
Preço de venda e de custo.
Unidade de medida (ex.: unidade, kg e pacote).
Categoria e/ou subcategoria.
Quantidade mínima em estoque para emissão de alerta de baixa.
- 📌 Justificativa: Facilitar a organização e gestão dos produtos, garantindo que todos os dados necessários estejam disponíveis e atualizados.
- 🔺 Prioridade: Média

---

# 📋 Requisito 4: Controle de Caixa
- 🆔 ID: REQ-004
- 📝 Descrição: O sistema deve gerenciar as movimentações financeiras diárias.
- 📑 Detalhamento:

O sistema deve permitir a visualização e edição das entradas e saídas financeiras.

O sistema deve permitir o acompanhamento do fluxo de caixa por período (diário, semanal, mensal).

Caso haja discrepância no fechamento do caixa, o sistema deve permitir o registro de um motivo.
Abertura de caixa com registro do valor inicial.
Fechamento de caixa com cálculo automático do saldo final e geração de relatórios diários.
Suporte para diferentes formas de pagamento (dinheiro, cartão, pix e etc.).

- 📌 Justificativa: Facilitar o controle financeiro diário, assegurando a precisão dos registros de vendas e o controle das finanças.
- 🔺 Prioridade: Alta

---

# 📋 Requisito 5: Emissão de Notas Fiscais
- 🆔 ID: REQ-005
- 📝 Descrição: O sistema deve emitir notas fiscais eletrônicas (NF-e) conforme a legislação vigente.
- 📑 Detalhamento:

O sistema deve gerar NF-e para todas as vendas, garantindo que as informações da transação estejam corretas e de acordo com a legislação fiscal.
O sistema deve permitir a emissão de NF-e com diferentes tipos de operação (venda, devolução, remessa, etc.).
O sistema deve fornecer relatórios detalhados com histórico de todas as notas fiscais emitidas, com possibilidade de exportação em documento excel ou CSV.
O sistema deve integrar-se com plataformas de emissão de NF-e com o SEFAZ para validação e envio automático.
O sistema deve permitir o cancelamento e correção de notas fiscais emitidas, com controle de registros de cada operação.
O sistema deve oferecer funcionalidades para consultar a situação da NF-e (em andamento, autorizada, cancelada, etc.).
Geração de NF-e para vendas.
Geração de relatórios de notas emitidas.
Integração com sistemas de emissão de nota fiscal eletrônica (ex.: SEFAZ).
Possibilidade de cancelamento e correção de notas fiscais emitidas.


- 📌 Justificativa: Garantir que o sistema esteja em conformidade com a legislação fiscal vigente e facilitar o processo de emissão de notas.
- 🔺 Prioridade: Alta

---

# 📋 Requisito 6: Relatórios
- 🆔 ID: REQ-006
- 📝 Descrição: O sistema deve ser capaz de emitir relatórios de vendas e controle de estoque.
- 📑 Detalhamento:
Registro de todas as entradas e saídas financeiras (ex.: vendas, devoluções, despesas, compras e etc.).
Possibilidade de filtrar os relatórios de vendas e notas fiscais de estoque por:	
Produto;
Data;
Estoque; 
Cliente; 
Fornecedor;
O relatório deve permitir a exportação em CSV e PDF.
- 📌 Justificativa: Garantir que o sistema esteja em conformidade com a legislação fiscal vigente e facilitar o processo de emissão de relatórios e consulta de dados.
- 🔺 Prioridade: Alta

---

# 📋 Requisito 7: Usuários
- 🆔 ID: REQ-007
- 📝 Descrição: O sistema deve permitir o cadastro de usuários e a gestão em níveis de acessos hierárquicos. 

- 📑 Detalhamento:
O sistema deve permitir o cadastro de usuários com regras de controle de acesso ao sistema e cada usuário deve ter um ID de identificação.
Usuário Administrador 
- Deve ter acesso a todas as telas existentes no sistema. 
- Deve ter a permissão para realizar qualquer ação dentro do sistema.


Usuário Funcionário
- Deve ter restrições de acesso às telas do sistema. 
- O usuário deve ter acesso somente as telas necessárias para a realização de suas tarefas.

- 📌 Justificativa: Garantir a segurança e organização do sistema, obter controle sobre as ações realizadas dentro do sistema.
- 🔺 Prioridade: Média

 ---
 
# 📋 Requisito 8: Processo de Inventário
- 🆔 ID: REQ-008
- 📝 Descrição: O sistema deve permitir a abertura de inventários cíclicos e configurações personalizadas para cada tipo de produto a ser inventariado.
- 📑 Detalhamento:

O sistema deve permitir a abertura de inventário a ser realizado, personalizado por grupo de produtos e/ou local de estoque.
O sistema deve permitir a coleta e lançamento do código e quantidade dos produtos que estão sendo inventariados.
O sistema deve permitir a visualização do inventário de forma clara e detalhada.  
O sistema deve permitir que após a análise do inventário, o usuário possa fazer o acerto de estoque, lançando perdas ou entradas de produtos com o motivo “Acerto de estoque por processo de inventário”.
Deve ser possível visualizar um histórico detalhado de todas as movimentações, com capacidade de filtragem por data, produto e tipo de operação (entrada/saída).
- 📌 Justificativa: Permite a gestão eficiente do estoque, análise das movimentações dos produtos e, além disso, identificar as perdas e/ou entrada de produtos .
- 🔺 Prioridade: Média

---

## 🖌️ Projeto Conceitual e Especificação do Design

![Logo ChocoArte](https://github.com/user-attachments/assets/8d7811ce-1830-4f3f-9342-89459bcb6ac8)<br>Figura 4 - Logo da Choco Arte


## :paintbrush: Identidade Visual

Para a construção da identidade visual do projeto, utilizamos as cores da empresa FiveTech, o azul, o verde e o cinza.

![fivetech(4)](https://github.com/user-attachments/assets/2bc54202-58e1-4290-9855-70fa56cd5b20) <br>Figura 5 - Logo FiveTech


As cores da nossa identidade traduzem nossa essência tecnológica: o azul vibrante (#1f11cc) reflete inovação e criatividade, enquanto o verde (#1dca16) simboliza dinamismo e evolução, equilibrados pelo cinza (#767474), que traz modernidade e estabilidade.

![Paleta de Core FiveTech](https://github.com/user-attachments/assets/f3ec0700-080b-4714-a6c1-de1484b95ebe)<br>Figura 6 - Paleta de Cores FiveTech


## 📐 Wireframe

![Telas do Sistema (2)](https://github.com/user-attachments/assets/c4ef0336-a3d8-407b-9a08-d4b729487aaf)Figura 7 - Wireframe das Telas do Sistema  

![Página de Login (3)](https://github.com/user-attachments/assets/dbf24920-7813-465d-8a6b-f4cba2f44830)Figura 8 - Wireframe Tela de Login


## 🎨 Prototipação

Após a criação do Wireframe, a prototipação foi realizada em nível de média e alta fidelidade. Para acessar, clique nos links a seguir: 

[Acesse a Média Fidelidade](https://drive.google.com/drive/folders/1R7iomUwCCo-xgGR7TqfGvp42g4ixE5XH?usp=sharing)


[Acesse a Alta Fidelidade](https://drive.google.com/drive/folders/1U-wxqddakBGYWnlJ5wGrn3xZpF3KwmCt?usp=sharing)

---

## ✅ Conclusão

Com a conclusão deste projeto, encerramos o desenvolvimento do protótipo do sistema de gestão de vendas e controle de estoque para a ChocoArte, sob a orientação da professora Cristiane Aparecida Lana. Este trabalho teve como objetivo criar uma solução personalizada para a Choco Arte, uma empresa que precisava modernizar seus processos operacionais. A FiveTech, ao longo deste projeto, teve a oportunidade de aplicar seu conhecimento em desenvolvimento de software, focando na otimização de processos e criando um protótipo funcional que atendesse às necessidades da empresa.

Durante a execução do projeto, houve uma integração entre as diversas etapas, como levantamento de requisitos, prototipação e design. Esse processo nos permitiu entender melhor os desafios da Choco Arte e como a tecnologia pode ser uma aliada para melhorar a gestão do dia a dia da empresa. A FiveTech reafirma sua capacidade de oferecer soluções que atendem de forma precisa às necessidades de seus clientes, contribuindo para a melhoria contínua dos seus processos.

Este projeto reflete o compromisso da FiveTech com inovação, qualidade e eficiência, além de consolidar seu papel como parceira estratégica no mercado de soluções digitais. A orientação da professora Cristiane Aparecida Lana foi fundamental para o sucesso da iniciativa, com seu apoio e direcionamento, conseguimos alcançar nossos objetivos e entregar uma solução tecnológica que, com certeza, fará a diferença para a Choco Arte.

A primeira versão deste projeto foi desenvolvido pelos alunos:



| Nome                                      | Curso                             | LinkedIn                                                   | GitHub                           |
| ----------------------------------------- | --------------------------------- | ---------------------------------------------------------- | -------------------------------- |
| <p align="center"> <img src="https://github.com/user-attachments/assets/782704bd-5e8d-4d57-aa3a-609eb8dfaddc" alt="João Paulo de Souza Gonçalves" width="150"></p> <p align="center"> João Paulo de Souza Gonçalves </p> | <p align="center"> Análise e Desenvolvimento de Sistemas | <p align="center">  [João Paulo de Souza Gonçalves](https://www.linkedin.com/in/jo%C3%A3o-paulo-de-souza-gon%C3%A7alves-84a73b252?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app) | <p align="center"> [Acesse o Github de João Paulo de Souza Gonçalves ](https://github.com/jpgoncalves-TI)|
| <p align="center"> <img src="https://github.com/user-attachments/assets/1eaaad53-3b83-45e2-a2f0-50c04898bf6e" alt="João Vitor" width="150"></p> <p align="center"> João Vitor Gomes </p> | <p align="center"> Análise e Desenvolvimento de Sistemas | <p align="center">  [João Vitor Gomes](https://www.linkedin.com/in/joao-vitor-991b54325/) | <p align="center"> [Acesse o Github de João Vitor](https://github.com/joaovitorgomes14)|
| <p align="center"> <img src="https://github.com/user-attachments/assets/083ac858-8c1d-4915-8bce-5049bb31f401" alt="Lucas" width="150"></p> <p align="center"> Lucas Santiago </p> | <p align="center"> Análise e Desenvolvimento de Sistemas | <p align="center"> [Lucas Santiago](https://www.linkedin.com/in/olucassantiago/) | <p align="center"> [Acesse o Github de Lucas](https://github.com/olucassantiago) |
| <p align="center"> <img src="https://github.com/user-attachments/assets/65874af9-b644-4366-b514-6492fea057e6" alt="Raphael" width="150"> </p> <p align="center"> Raphael Souza </p>  | <p align="center"> Análise e Desenvolvimento de Sistemas | <p align="center"> [Raphael Souza](https://www.linkedin.com/in/raphael-souza-522b48338) | <p align="center"> [Acesse o Github de Raphael](https://github.com/RaphaSouza28) |
| <p align="center"> <img src="https://github.com/user-attachments/assets/14e36e06-1bfd-4942-992f-54c22697def5" alt="Ronald" width="150"> </p> <p align="center"> Ronald Neves </p> | <p align="center"> Análise e Desenvolvimento de Sistemas | <p align="center"> [Ronald Neves](https://www.linkedin.com/in/ronald-neves-1086042a9) | <p align="center"> [Acesse o Github de Ronald](https://github.com/ronald-neves) |
| <p align="center"> <img src="https://github.com/user-attachments/assets/abb672e5-32cb-440e-a327-366f2666f59c" alt="Samuel" width="150">  </p> <p align="center"> Samuel Souza </p>   | <p align="center"> Análise e Desenvolvimento de Sistemas | <p align="center"> [Samuel Souza](https://www.linkedin.com/in/samuel-souza-4aa3b9338/) | <p align="center"> [Acesse o Github de Samuel](https://github.com/samuelsouza10)|
| <p align="center"> <img src="https://github.com/user-attachments/assets/6a4ce95c-4096-4a9e-9293-47b089e48977" alt="Sérgio Dias" width="150"></p> <p align="center">Sérgio Dias</p>   | <p align="center"> Análise e Desenvolvimento de Sistemas | <p align="center"> [Sérgio Dias](https://www.linkedin.com/in/sergio-augusto-dias-65024729a) | <p align="center"> [Acesse o Github de Sérgio](https://github.com/Sergiodias130) |

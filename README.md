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
Em um dia típico na vida de Arthur, um jovem de 23 anos residente em Teixeiras – MG, a busca pelo equilíbrio entre suas diversas atividades diárias se apresenta como um desafio constante. Estudante de Análise e Desenvolvimento de Sistemas, Arthur não apenas se dedica aos estudos, mas também investe seu tempo em sua pequena empresa de doces, onde aplica suas habilidades empreendedoras.

Além de sua jornada acadêmica e profissional, Arthur valoriza momentos de lazer e convivência com a família, a namorada e os amigos. Os finais de semana são especialmente significativos, pois ele se entrega à sua paixão por esportes, participando de animados jogos de vôlei. Essa combinação de responsabilidades e prazeres reflete sua determinação em alcançar o sucesso, tanto nos estudos quanto nos negócios, enquanto mantém uma vida social ativa e gratificante.

[História completa do Storytelling...]

---

## :busts_in_silhouette: Who - Análise dos Stakeholders
### :busts_in_silhouette: Análise dos Stakeholders
![Análise de Stakeholders](https://github.com/user-attachments/assets/b59f0448-b684-42f4-b3e9-fc35d4109adf)

### :bust_in_silhouette: Persona
![Brown and Cream Minimalist User Persona Poster (1)](https://github.com/user-attachments/assets/c0bea6ae-8d0f-48de-b58f-1abbf9a1c20c) Figura 2 - Persona

#### :thought_balloon: Mapa de Empatia
![Mapa de Empatia (1)](https://github.com/user-attachments/assets/68e28d83-0419-4cee-87d8-334226f08288) Figura 3 - Mapa de Empatia

---

## :gear: Engenharia de Requisitos

## :memo: Elicitação de Requisitos

Durante a reunião com o cliente, foram identificadas as principais necessidades que o sistema deve atender, organizadas nas seguintes categorias:
- Controle de estoque;
  Alerta de baixa de estoque;
  Cadastro de produtos, incluindo um campo para o código EAN (código de barras).
- Controle Financeiro;
  Controle de caixa, abrangendo o fechamento de caixa e outras funcionalidades;
  Emissão de notas fiscais.
- Gestão de Perdas;
  Funcionalidade para registrar perdas de produtos devido a vencimento, mofo e deterioração.
- Gerador de relatórios;
  Relatórios de produtos produzidos, incluindo entradas e saídas;
  Relatórios de vendas, com opções de filtragem por produto, período e forma de pagamento;
  Relatórios financeiros, apresentando a relação entre receita e despesas (lucro) e a análise de produção, vendas e quebras (margem de lucro).
- Dashboard;
  Dashboard com opções personalizáveis de gráficos, incluindo gráficos de linha, coluna e barra.
- Consulta de Notas Fiscais;
  Tela para consulta de notas fiscais de vendas, com filtros disponíveis como CPF do cliente, número da nota fiscal e período. 
- Gestão de usuários

---

## :page_with_curl: Especificação de Requisitos

# 📋 Requisitos do Sistema

# 📋 Requisito 1: Controle de Estoque
🆔 ID: REQ-001

📝 Descrição: O sistema deve permitir o acompanhamento em tempo real do estoque, garantindo uma gestão eficiente e precisa dos produtos disponíveis.

📑 Detalhamento:

- O sistema deve incluir funcionalidades para controle de estoque, alertando automaticamente quando os níveis de produtos atingirem um limite mínimo.
- O cadastro de produtos deve ser facilitado, incluindo um campo específico para o código EAN (código de barras), permitindo uma identificação única e rápida dos itens.
- A interface de consulta deve ser intuitiva e oferecer a opção de exportação dos dados para relatórios em formatos como CSV ou PDF.
- O sistema deve permitir a atualização automática do estoque após cada movimentação registrada, garantindo que as informações estejam sempre atualizadas.
- O usuário deve ser capaz de consultar a quantidade disponível de cada item existente no estoque, além de visualizar todas as movimentações dos produtos (entradas e saídas).
- Deve ser possível acessar um histórico detalhado de movimentações, com capacidade de filtragem por data, produto e tipo de operação (entrada/saída).
📌 Justificativa: Essa abordagem permite uma gestão eficiente do estoque, evitando perdas e otimizando o controle dos produtos disponíveis, além de facilitar o cadastro e a identificação dos itens.
🔺 Prioridade: Alta

---

# 📋 Requisito 2: Controle Financeiro
🆔 ID: REQ-002

📝 Descrição: O sistema deve gerenciar o controle financeiro, abrangendo funcionalidades de controle de caixa, fechamento de caixa e emissão de notas fiscais.

📑 Detalhamento:

- O sistema deve permitir o registro e a visualização das movimentações financeiras diárias, incluindo entradas e saídas de caixa.
- O controle de caixa deve incluir funcionalidades para o fechamento de caixa, permitindo que os usuários registrem o valor inicial, calculem o saldo final e gerem relatórios diários.
- O sistema deve suportar diferentes formas de pagamento (dinheiro, cartão, pix, etc.), garantindo flexibilidade nas transações.
- A emissão de notas fiscais deve ser integrada ao sistema, permitindo que todas as vendas sejam registradas de acordo com a legislação vigente, com a possibilidade de gerar relatórios detalhados sobre as notas emitidas.
- O sistema deve permitir a configuração de alertas para discrepâncias no fechamento do caixa, possibilitando o registro de motivos para qualquer diferença encontrada.
📌 Justificativa: Essa abordagem assegura um controle financeiro eficiente, facilitando a gestão das receitas e despesas, além de garantir a conformidade com as obrigações fiscais.
🔺 Prioridade: Alta

---

# 📋 Requisito 3: Gestão de Perdas
🆔 ID: REQ-003

📝 Descrição: O sistema deve incluir uma funcionalidade para registrar e gerenciar perdas de produtos, abrangendo situações como vencimento, mofo e deterioração.

📑 Detalhamento:

- O sistema deve permitir o registro detalhado de perdas de produtos, especificando a causa da perda (vencimento, mofo, deterioração, etc.) e a quantidade afetada.
- A interface deve ser intuitiva, facilitando a entrada de dados e a consulta das perdas registradas.
- O sistema deve gerar relatórios sobre as perdas, permitindo que os usuários visualizem as informações por período, tipo de produto e causa da perda.
- Deve ser possível configurar alertas para notificar os responsáveis sobre produtos próximos ao vencimento ou em condições inadequadas de armazenamento, ajudando a prevenir perdas futuras.
- O registro de perdas deve ser integrado ao controle de estoque, garantindo que as quantidades disponíveis sejam atualizadas automaticamente após o lançamento das perdas.
📌 Justificativa: A gestão eficaz das perdas é fundamental para minimizar desperdícios, otimizar o controle de estoque e garantir a qualidade dos produtos oferecidos.
🔺 Prioridade: Média

---

# 📋 Requisito 4: Emissão e Consulta de Notas Fiscais
🆔 ID: REQ-004

📝 Descrição: O sistema deve permitir a emissão de notas fiscais eletrônicas (NF-e) e incluir uma tela para consulta de notas fiscais de vendas, com filtros disponíveis para facilitar a busca.

📑 Detalhamento:

- O sistema deve gerar NF-e para todas as vendas, assegurando que as informações estejam corretas e em conformidade com a legislação fiscal vigente.
- A emissão de notas deve incluir diferentes tipos de operação, como venda, devolução e remessa, garantindo flexibilidade nas transações.
- Deve ser disponibilizada uma tela específica para consulta de notas fiscais emitidas, permitindo que os usuários busquem informações utilizando filtros como CPF do cliente, número da nota fiscal e período.
- O sistema deve possibilitar a exportação de relatórios detalhados sobre as notas fiscais emitidas, com a opção de exportação em formatos como CSV ou PDF.
- A consulta deve incluir a possibilidade de visualizar a situação da NF-e (em andamento, autorizada, cancelada, etc.), proporcionando transparência e controle sobre as transações.
📌 Justificativa: A funcionalidade de emissão e consulta de notas fiscais é essencial para garantir a conformidade fiscal, facilitar o acesso às informações e otimizar o processo de vendas.
🔺 Prioridade: Alta

---

# 📋 Requisito 5: Gerador de Relatórios
🆔 ID: REQ-005

📝 Descrição: O sistema deve incluir um gerador de relatórios abrangente, permitindo a criação de relatórios detalhados sobre produtos, vendas e aspectos financeiros.

📑 Detalhamento:

- O gerador de relatórios deve permitir a criação de relatórios de produtos produzidos, incluindo informações sobre entradas e saídas, facilitando o acompanhamento da movimentação de estoque.
- Deve ser possível gerar relatórios de vendas, com opções de filtragem por produto, período e forma de pagamento, permitindo uma análise detalhada do desempenho das vendas.
- O sistema deve oferecer relatórios financeiros que apresentem a relação entre receita e despesas, possibilitando o cálculo do lucro. Além disso, deve incluir análises sobre produção, vendas e quebras, permitindo a avaliação da margem de lucro.
- Os relatórios devem ser exportáveis em formatos como CSV e PDF, garantindo que os usuários possam compartilhar e analisar os dados de forma eficiente.
- O sistema deve permitir a programação de relatórios periódicos, que podem ser gerados automaticamente em intervalos definidos, facilitando o acompanhamento contínuo das métricas de desempenho.
📌 Justificativa: A capacidade de gerar relatórios detalhados é fundamental para a tomada de decisões informadas, permitindo que a empresa monitore seu desempenho e identifique oportunidades de melhoria.
🔺 Prioridade: Alta

---

# 📋 Requisito 6: Dashboard Personalizável
🆔 ID: REQ-006

📝 Descrição: O sistema deve incluir um dashboard interativo e personalizável, permitindo a visualização de dados por meio de diferentes tipos de gráficos.

📑 Detalhamento:

- O dashboard deve oferecer opções personalizáveis de visualização, permitindo que os usuários escolham entre gráficos de linha, coluna e barra, conforme suas preferências e necessidades de análise.
- Os usuários devem ter a capacidade de selecionar quais métricas e dados desejam visualizar no dashboard, como vendas, estoque, perdas e desempenho financeiro.
- O sistema deve permitir a configuração de filtros para que os usuários possam ajustar a visualização dos dados por período, categoria de produto e outras variáveis relevantes.
- O dashboard deve ser atualizado em tempo real, refletindo as informações mais recentes do sistema, garantindo que os usuários tenham acesso a dados atualizados para a tomada de decisões.
- Deve ser possível salvar e compartilhar configurações de dashboard personalizadas, permitindo que diferentes usuários tenham acesso a visualizações que atendam às suas necessidades específicas.
📌 Justificativa: Um dashboard personalizável proporciona uma visão clara e rápida das métricas mais importantes, facilitando a análise de dados e a tomada de decisões estratégicas.
🔺 Prioridade: Alta
---

# 📋 Requisito 7: Gestão de Usuários
🆔 ID: REQ-007

📝 Descrição: O sistema deve incluir uma funcionalidade robusta para a gestão de usuários, permitindo o controle de acesso e a administração de permissões.

📑 Detalhamento:

- O sistema deve permitir o cadastro de novos usuários, incluindo informações como nome, e-mail, cargo e nível de acesso.
- Deve ser possível definir diferentes níveis de permissão para os usuários, garantindo que cada um tenha acesso apenas às funcionalidades necessárias para suas funções.
- A interface de gestão de usuários deve ser intuitiva, permitindo a fácil visualização e edição das informações dos usuários cadastrados.
- O sistema deve incluir funcionalidades para a recuperação de senhas e a configuração de autenticação de dois fatores, aumentando a segurança no acesso.
- Deve ser possível gerar relatórios sobre a atividade dos usuários, permitindo o monitoramento de acessos e ações realizadas dentro do sistema.
- O sistema deve permitir a desativação ou exclusão de usuários, garantindo que o acesso seja controlado de forma eficaz.
📌 Justificativa: A gestão de usuários é essencial para garantir a segurança e a integridade do sistema, permitindo um controle adequado sobre quem pode acessar e modificar informações sensíveis.
🔺 Prioridade: Alta
 ---

## :gear: Diagramas

### Diagrama de Casos de Uso
Este Diagrama de Casos de Uso representa as principais interações entre os atores (usuários e sistemas externos) e o sistema central responsável pela gestão de produtos, vendas, estoque e relatórios.

![Caso de Uso](https://github.com/user-attachments/assets/45e6d6e1-395c-4e1f-ab7c-b975e9da00f7)

### Diagrama de Classes
Esse diagrama foi modelado utilizando os princípios da Programação Orientada a Objetos (POO) e tem como objetivo organizar e estruturar os principais componentes do sistema.
![Diagrama de Classe](https://github.com/user-attachments/assets/be55a056-374c-4654-ae6e-93c58a26190c)

### Digrama de Sequência
Este diagrama ilustra o fluxo de interação entre os componentes do sistema durante uma movimentação de estoque e vendas. Ele segue a lógica de uma arquitetura orientada a eventos e demonstra claramente os pontos de integração com sistemas externos, como a SEFAZ (integração futura).

![Diagrama de Colaboração](https://github.com/user-attachments/assets/588b3fb5-525a-4b5a-8f74-e67f81c1460c)

### Diagrama de Estado
Este Diagrama de Estados descreve o fluxo de transições entre os diversos estados que os módulos do sistema podem assumir ao longo de seu funcionamento. Ele é essencial para compreender como o sistema reage a eventos internos e externos, permitindo um controle mais robusto e previsível da lógica de negócio.

![Diagrama de Estado_](https://github.com/user-attachments/assets/0656d26d-9424-48ff-9975-1e7bd102f08f)

### Diagrama de Atividade
O Diagrama de Atividade apresentado descreve o fluxo funcional do processo de cadastro de produtos no sistema, abrangendo tanto o cadastro manual quanto a importação em lote via arquivos CSV/Excel. Esse diagrama é essencial para visualizar as etapas, decisões e validações envolvidas nesse processo.

![Diagrama de Atividade_](https://github.com/user-attachments/assets/a9e07616-52ae-498a-b8ff-26ae4b200b4f)



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

Após a criação do Wireframe, a prototipação foi realizada em nível de alta fidelidade. Para acessar, clique nos links a seguir: 



[Acesse a Alta Fidelidade](https://drive.google.com/drive/folders/1Ch30sAlym5JltQhhMdMmgWLuFLfm07RR?usp=sharing)

---

## ✅ Conclusão do Protótipo 

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

## ✅ Evolução do Projeto
Com a continuidade do projeto sob a orientação do professor Hermes Nunes Pereira Junior, a FiveTech está prestes a realizar um avanço significativo no sistema de gestão de vendas e controle de estoque da ChocoArte. Após o sucesso do protótipo previamente desenvolvido, estamos prontos para a implementação física do sistema. Essa fase nos proporciona uma excelente oportunidade para incorporar melhorias e inovações que atenderão ainda mais eficazmente às demandas da empresa.

O desenvolvimento deste projeto foi ampliado com a inclusão de mais dois membros, os alunos:

| Nome                                      | Curso                             | LinkedIn                                                   | GitHub                           |
| ----------------------------------------- | --------------------------------- | ---------------------------------------------------------- | -------------------------------- |
| <p align="center"> <img src="https://avatars.githubusercontent.com/u/184315558?v=4" alt="Elias" width="150">  </p> <p align="center">Elias </p>   | <p align="center"> Análise e Desenvolvimento de Sistemas | <p align="center"> [Elias]() | <p align="center"> [Acesse o Github de Elias](https://github.com/Elias-7777)|
| <p align="center"> <img src="https://avatars.githubusercontent.com/u/107133741?v=4" alt="Jorge Cardoso" width="150"></p> <p align="center">Jorge Cardoso </p>   | <p align="center"> Análise e Desenvolvimento de Sistemas | <p align="center"> [Jorge Cardoso](https://www.linkedin.com/in/jorgelfcardoso/) | <p align="center"> [Acesse o Github de Jorge](https://github.com/jorgefcardoso) |

## 📑 Estrutura da Equipe
- Organização dos times e responsabilidades

| Área                                      | Membros                            | Responsabilidade                                           |
| ----------------------------------------- | ---------------------------------  | ---------------------------------------------------------- |
|<p align="center"> Scrum Master </p> | <p align="center"> João Paulo<br> | <p align="center"> Definição das sprints<br>  Definição dos prazos<br>  Acompanhamento dos times |
|<p align="center"> Backend </p> | <p align="center"> Lucas Santiago<br> Jorge<br>  Ronald Neves | <p align="center"> Desenvolvimento da lógica e estrutura do servidor, APIs e integrações |
|<p align="center"> Frontend </p> | <p align="center"> Sérgio Dias<br>  Elias<br>  Samuel Souza | <p align="center"> Desenvolvimento da interface do usuário<br>Samuel Souza: Design e Fluxo de páginas |
|<p align="center"> Banco de Dados </p> | <p align="center"> Raphael Souza<br>  João Victor Gomes | <p align="center"> Modelagem, otimização e manutenção dos bancos de dados |

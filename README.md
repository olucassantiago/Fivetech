# 📊 Relatório Criação de Sistema de Gerenciamento de Vendas e Estoque

![Logo ChocoArte](https://github.com/user-attachments/assets/8d7811ce-1830-4f3f-9342-89459bcb6ac8) 

Figura 1 - Logo Choco Arte

---

## :memo: Visão Geral
### :climbing: O Desafio
Conceber e desenvolver um protótipo de software para automatizar e otimizar o processo de vendas e controle de estoque da empresa Chocoarte. 

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
O sistema será utilizado exclusivamente pelos proprietários da Chocoarte, não sendo acessado diretamente pelos clientes.

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

---

## :page_with_curl: Especificação de Requisitos

### :clipboard: Requisito 1: Controle de Estoque

:id: **ID:** REQ-001  
:memo: **Descrição:** O sistema deve permitir o acompanhamento em tempo real do inventário.  
:bookmark_tabs: **Detalhamento:**  
- O usuário deve ser capaz de consultar a quantidade disponível de cada item no inventário.
- O sistema deve registrar a entrada e saída de produtos.
- Deve ser possível visualizar um histórico detalhado de movimentações, com capacidade de filtragem por data, produto e tipo de operação (entrada/saída).  
:pushpin: **Justificativa:** Permite a gestão eficiente do inventário, evitando perdas e otimizando o controle dos produtos disponíveis.  
:small_red_triangle: **Prioridade:** Alta  

### :clipboard: Requisito 2: Alerta de Baixa de Estoque

:id: **ID:** REQ-002  
:memo: **Descrição:** O sistema deve emitir alertas automáticos quando o nível de estoque de qualquer produto atingir ou estiver abaixo de um valor mínimo definido.  
:bookmark_tabs: **Detalhamento:**  
- O sistema deve permitir a configuração de valores mínimos de estoque por produto.
- O alerta deve ser enviado por e-mail e/ou exibido dentro do sistema.
- O sistema deve gerar relatórios com produtos que possuem estoque abaixo do mínimo definido.  
:pushpin: **Justificativa:** Garantir a reposição de produtos e evitar rupturas de estoque.  
:small_red_triangle: **Prioridade:** Média  

### :clipboard: Requisito 3: Cadastro de Produtos

:id: **ID:** REQ-003  
:memo: **Descrição:** O sistema deve possibilitar o cadastro, consulta, edição e exclusão de produtos.  
:bookmark_tabs: **Detalhamento:**  
As seguintes informações são obrigatórias no cadastro:
- Nome do produto.
- Código do produto (SKU ou outro identificador único).
- Descrição detalhada.
- Preço de venda e de custo.
- Unidade de medida (ex.: unidade, kg).
- Categoria e/ou subcategoria.
- Quantidade mínima em estoque para emissão de alerta de baixa.  
:pushpin: **Justificativa:** Facilitar a organização e gestão dos produtos, garantindo que todos os dados necessários estejam disponíveis e atualizados.  
:small_red_triangle: **Prioridade:** Média  

### :clipboard: Requisito 4: Controle de Caixa

:id: **ID:** REQ-004  
:memo: **Descrição:** O sistema deve gerenciar as movimentações financeiras diárias.  
:bookmark_tabs: **Detalhamento:**  
- Abertura de caixa com registro do valor inicial.
- Registro de todas as entradas e saídas financeiras (ex.: vendas, devoluções, despesas).
- Fechamento de caixa com cálculo automático do saldo final e geração de relatórios diários.
- Suporte para diferentes formas de pagamento (dinheiro, cartão, etc.).  
:pushpin: **Justificativa:** Facilitar o controle financeiro diário, assegurando a precisão dos registros e o controle das finanças.  
:small_red_triangle: **Prioridade:** Alta  

### :clipboard: Requisito 5: Emissão de Notas Fiscais

:id: **ID:** REQ-005  
:memo: **Descrição:** O sistema deve emitir notas fiscais eletrônicas (NF-e) conforme a legislação vigente.  
:bookmark_tabs: **Detalhamento:**  
- Geração de NF-e para vendas.
- Geração de relatórios com histórico de notas emitidas.
- Integração com sistemas de emissão de nota fiscal eletrônica (ex.: SEFAZ).
- Possibilidade de cancelamento e correção de notas emitidas.  
:pushpin: **Justificativa:** Garantir que o sistema esteja em conformidade com a legislação fiscal vigente e facilitar o processo de emissão de notas.  
:small_red_triangle: **Prioridade:** Média  

---

## 🖌️ Projeto Conceitual e Especificação do Design

![Logo ChocoArte](https://github.com/user-attachments/assets/8d7811ce-1830-4f3f-9342-89459bcb6ac8)<br>Figura 4 - Logo da ChocoArte


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

Com a conclusão deste projeto, encerramos o desenvolvimento do protótipo do sistema de gestão de vendas e controle de estoque para a ChocoArte, sob a orientação da professora Cristiane Aparecida Lana. Este trabalho teve como objetivo criar uma solução personalizada para a ChocoArte, uma empresa que precisava modernizar seus processos operacionais. A FiveTech, ao longo deste projeto, teve a oportunidade de aplicar seu conhecimento em desenvolvimento de software, focando na otimização de processos e criando um protótipo funcional que atendesse às necessidades da empresa.

Durante a execução do projeto, houve uma integração entre as diversas etapas, como levantamento de requisitos, prototipação e design. Esse processo nos permitiu entender melhor os desafios da ChocoArte e como a tecnologia pode ser uma aliada para melhorar a gestão do dia a dia da empresa. A FiveTech reafirma sua capacidade de oferecer soluções que atendem de forma precisa às necessidades de seus clientes, contribuindo para a melhoria contínua dos seus processos.

Este projeto reflete o compromisso da FiveTech com inovação, qualidade e eficiência, além de consolidar seu papel como parceira estratégica no mercado de soluções digitais. A orientação da professora Cristiane Aparecida Lana foi fundamental para o sucesso da iniciativa, com seu apoio e direcionamento, conseguimos alcançar nossos objetivos e entregar uma solução tecnológica que, com certeza, fará a diferença para a ChocoArte.

A primeira versão deste projeto foi desenvolvido pelos alunos:

| Nome                                      | Curso                             | LinkedIn                                                   | GitHub                           |
| ----------------------------------------- | --------------------------------- | ---------------------------------------------------------- | -------------------------------- |
| <p align="center"> <img src="https://github.com/user-attachments/assets/QQQWQW" alt="João Vitor" width="150"></p> <p align="center"> João Vitor Gomes </p> | <p align="center"> Análise e Desenvolvimento de Sistemas | <p align="center"> <img src="https://github.com/user-attachments/assets/7113bcc1-6a9d-4642-92ed-fa1f34ef65a6"> [João Vitor Gomes](https://www.linkedin.com/in/joao-vitor-991b54325/) | <p align="center"> [Acesse o Github de João Vitor](https://github.com/joaovitorgomes14) 

| <p align="center"> <img src="https://github.com/user-attachments/assets/083ac858-8c1d-4915-8bce-5049bb31f401" alt="Lucas" width="150"></p> <p align="center"> Lucas Santiago </p> | <p align="center"> Análise e Desenvolvimento de Sistemas | <p align="center"> [Lucas Santiago](https://www.linkedin.com/in/olucassantiago/) | <p align="center"> [Acesse o Github de Lucas](https://github.com/olucassantiago) |
| <p align="center"> <img src="https://github.com/user-attachments/assets/65874af9-b644-4366-b514-6492fea057e6" alt="Raphael" width="150"> </p> <p align="center"> Raphael Souza </p>  | <p align="center"> Análise e Desenvolvimento de Sistemas | <p align="center"> [Raphael Souza](https://www.linkedin.com/in/raphael-souza-522b48338) | <p align="center"> [Acesse o Github de Raphael](https://github.com/RaphaSouza28) |
| <p align="center"> <img src="https://github.com/user-attachments/assets/14e36e06-1bfd-4942-992f-54c22697def5" alt="Ronald" width="150"> </p> <p align="center"> Ronald Neves </p> | <p align="center"> Análise e Desenvolvimento de Sistemas | <p align="center"> [Ronald Neves](https://www.linkedin.com/in/ronald-neves-1086042a9) | <p align="center"> [Acesse o Github de Ronald](https://github.com/ronald-neves) |
| <p align="center"> <img src="https://github.com/user-attachments/assets/abb672e5-32cb-440e-a327-366f2666f59c" alt="Samuel" width="150">  </p> <p align="center"> Samuel Souza </p>   | <p align="center"> Análise e Desenvolvimento de Sistemas | <p align="center"> [Samuel Souza](https://www.linkedin.com/in/samuel-souza-4aa3b9338/) | <p align="center"> [Acesse o Github de Samuel](https://github.com/samuelsouza10)|
| <p align="center"> <img src="https://github.com/user-attachments/assets/6a4ce95c-4096-4a9e-9293-47b089e48977" alt="Sérgio Dias" width="150"></p> <p align="center">Sérgio Dias</p>   | <p align="center"> Análise e Desenvolvimento de Sistemas | <p align="center"> [Sérgio Dias](https://www.linkedin.com/in/sergio-augusto-dias-65024729a) | <p align="center"> [Acesse o Github de Sérgio](https://github.com/Sergiodias130) |


# 📘 Documentação da API - FiveTech Backend (Laravel)

API RESTful para sistema de vendas, estoque e produtos.

---

## 🔐 Autenticação

### Login
`POST /api/login`

**Body:**
```json
{
  "email": "admin@admin.com",
  "password": "admin123"
}
```

**Retorno:**
```json
{
  "token": "TOKEN_JWT"
}
```

**Headers para uso posterior:**
```
Authorization: Bearer TOKEN_JWT
```

---

## 👤 Usuário

### Detalhes do usuário logado
`GET /api/user`

---

## 📦 Produtos

### Listar produtos
`GET /api/produtos`

### Criar produto
`POST /api/produtos`
```json
{
  "nome": "Produto A",
  "preco": 100.00,
  "quantidade_estoque": 50
}
```

### Atualizar produto
`PUT /api/produtos/{id}`

### Deletar produto
`DELETE /api/produtos/{id}`

---

## 🧾 Vendas

### Criar nova venda
`POST /api/vendas`
```json
{
  "itens": [
    { "produto_id": 1, "quantidade": 2 },
    { "produto_id": 2, "quantidade": 1 }
  ]
}
```

### Listar vendas
`GET /api/vendas`

---

## 🛒 Ponto de Venda (PDV)
Funciona com a mesma rota de criar venda: `POST /api/vendas`

---

## 📈 Dashboard

### Resumo de KPIs
`GET /api/vendas-dashboard`

### Produtos mais vendidos
`GET /api/top-produtos`

---

## 📥 Estoque

### Movimentar estoque
`POST /api/estoque/movimentar`
```json
{
  "produto_id": 1,
  "tipo": "entrada",
  "quantidade": 10
}
```

### Histórico de movimentações
`GET /api/estoque/historico`

---

## 🔒 Middleware

Todas as rotas (exceto `/login`) exigem:
```
Authorization: Bearer TOKEN
```

---

**Status de resposta comuns:**
- 200 OK
- 201 Created
- 400 Bad Request
- 401 Unauthorized
- 422 Validation Error

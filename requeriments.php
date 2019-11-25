

|||||||||||||||||||||||||||||
| Uso da API Usuários: |
|||||||||||||||||||||||||||||


Listar todos usuários:
GET /api/v1/usuarios

Localizar usuário pelo ID:
GET /api/v1/usuarios/{id}

Criar usuário:
POST /api/v1/usuarios

Exemplo de uso:

{
    "data": [
        {
            "first_name": "Usuário",
            "last_name": "Sobrenome",
            "email": "email@gmail.com",
            "pwd": "senha"
        }
    ]
}


Atualizar usuário:
PUT /api/v1/usuarios/{id}

Exemplo de uso:
{
    "data": [
        {
            "first_name": "Usuário 2",
            "last_name": "Sobrenome 2",
            "email": "usuario@gmail.com",
            "pwd": "senha 2"
        }
    ]
}

Excluir usuário:
DELETE /api/v1/usuarios/{id}
DEVSNOTES: Sistemas de anotações simples

## O que o projeto precisa fazer?
- Listar as anotações
- Ver uma anotação específica
- Inserir uma nova anotação
- Atualizar uma anotação 
- Deletar uma anotação

## Qual a estrutura de dados?
- local para armazenas as anotações
-- id
-- title
-- body

## Quais os endpoints? 
- (GET) /api/notes
- (GET) /api/note/123
- (POST) /api/note (title, body)
- (PUT) /api/note/123 (title, body)
- (DELETE) /api/note/123


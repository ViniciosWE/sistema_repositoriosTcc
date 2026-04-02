# 📚 Sistema de Repositório de TCC

Sistema web desenvolvido para **armazenamento e gerenciamento de Trabalhos de Conclusão de Curso (TCC)**, permitindo o controle de bancas avaliadoras, orientadores e trabalhos acadêmicos.

⚠️ Nota: O arquivo `.env` está no repositório apenas por ser um projeto de estudo, para facilitar a avaliação. Em projetos reais, ele não deve ser enviado para o GitHub e deve ficar no `.gitignore`.

---

## 🚀 Tecnologias utilizadas

- Laravel (Framework PHP)
- Bootstrap (estilização da interface)
- MySQL (banco de dados)
- PHP

---

## 📌 Funcionalidades

- 📄 Cadastro e gerenciamento de TCCs  
- 👨‍🏫 Definição de:
  - Orientador  
  - Avaliador 1  
  - Avaliador 2  
- 🧑‍⚖️ Cadastro de bancas avaliadoras  
- 👥 Cadastro de integrantes da banca  
- 🔗 Associação automática dos avaliadores via seleção da banca  
- 📂 Organização dos trabalhos acadêmicos  

---

## 🧠 Como funciona

O sistema permite cadastrar bancas com seus respectivos integrantes.

Ao cadastrar um TCC, os campos de:

- Orientador  
- Avaliador 1  
- Avaliador 2  

são preenchidos a partir de um **select (combo)** baseado nas bancas cadastradas, evitando erros e padronizando os dados.

---
## Autor

* **Vinícios Weide Ebling** - [vinicioswe2005@gmail.com](mailto:vinicioswe2005@gmail.com)

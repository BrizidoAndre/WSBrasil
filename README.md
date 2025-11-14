# WSBrasil

## 🌐 Aplicação Web Completa (Yii2 Framework)

O **WSBrasil** é uma aplicação web robusta desenvolvida utilizando o *framework* **Yii2** (PHP), seguindo o padrão de arquitetura **Model-View-Controller (MVC)**. A estrutura do repositório, que inclui pastas como `bases`, `controllers`, `models` e `purepages`, sugere que este é um projeto de grande escopo, possivelmente um sistema de gerenciamento ou um portal web complexo.

### ✨ Funcionalidades e Estrutura

O projeto é baseado no **Yii 2 Basic Project Template**, mas com extensões que indicam um desenvolvimento mais aprofundado:

*   **Estrutura MVC:** O uso do Yii2 garante a separação de responsabilidades, essencial para a manutenção e escalabilidade de aplicações web.
*   **Módulos de Conteúdo:** A presença de pastas como `bases` e `purepages` sugere a existência de módulos para gerenciamento de dados base e páginas estáticas ou de conteúdo.
*   **Recursos Visuais:** A pasta `images` indica que o projeto utiliza recursos visuais para a interface do usuário.
*   **Componentes de Aplicação:** Pastas como `assets`, `commands`, `config`, `mail/layouts`, `runtime`, `tests`, `vagrant`, `views`, `web` e `widgets` confirmam a estrutura de um projeto Yii2 completo, incluindo testes, configuração de ambiente (Vagrant) e componentes de interface (`widgets`).

### 🛠️ Tecnologias Utilizadas

| Tecnologia | Uso Principal |
| :--- | :--- |
| **PHP** | Linguagem de programação principal. |
| **Yii2 Framework** | Estrutura MVC para o desenvolvimento da aplicação. |
| **HTML5** | Estrutura e marcação do conteúdo. |
| **CSS3** | Estilização e layout. |

### 📂 Estrutura do Projeto

O projeto segue a estrutura padrão do Yii2 Basic Project Template, com adições específicas:

```
WSBrasil/
├── .vs/                # Arquivos de configuração do Visual Studio (se aplicável)
├── assets/             # Definições de Assets (JS, CSS)
├── bases/              # Módulos de dados base ou funcionalidades centrais
├── commands/           # Comandos de Console
├── config/             # Configurações da Aplicação
├── controllers/        # Controladores da Aplicação (Lógica de Negócio)
├── images/             # Recursos visuais
├── mail/layouts/       # Layouts de E-mail
├── models/             # Modelos de Dados (Estrutura e Regras)
├── purepages/          # Páginas estáticas ou de conteúdo puro
├── runtime/            # Arquivos gerados em tempo de execução
├── tests/              # Testes (Codeception)
├── vagrant/            # Configuração de ambiente de desenvolvimento (Vagrant)
├── views/              # Arquivos de Visualização (Views)
├── web/                # Ponto de entrada da aplicação (index.php)
├── widgets/            # Componentes de interface reutilizáveis
└── README.md           # Este arquivo
```

### 🚀 Como Executar

O projeto requer um ambiente de servidor web com PHP e um banco de dados.

1.  **Instalação de Dependências:**
    ```bash
    composer install
    ```
2.  **Configuração do Banco de Dados:**
    Edite o arquivo `config/db.php` com as credenciais do seu banco de dados.
3.  **Acesso:**
    A aplicação pode ser acessada através do servidor web configurado (ex: `http://localhost/wsbrasil/web/`).

### 📝 Licença

Este projeto está sob a licença [MIT](https://choosealicense.com/licenses/mit/).

---
*Desenvolvido por [BrizidoAndre](https://github.com/BrizidoAndre)*

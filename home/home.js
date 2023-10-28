function Addcadastroview() {
  const meuformulario = document.createElement("div");
  meuformulario.id = "meu_formulario";
  const formulario = document.createElement("form");
  const titulo = document.createElement("h1");
  titulo.textContent = "Cadastre";
  formulario.method = "POST";
  formulario.action = "home.php";
  const inputnome = document.createElement("input");
  inputnome.type = "text";
  inputnome.name = "email_cadastro";
  inputnome.placeholder = "digite o nome de usuário";
  inputnome.required = true;
  const inputsenha = document.createElement("input");
  inputsenha.type = "password";
  inputsenha.name = "senha_cadastro";
  inputsenha.required = true;
  inputsenha.placeholder = "digite uma senha";
  const btn = document.createElement("button");
  btn.textContent = "Cadastrar";
  btn.type = "submit";
  const jatemconta = document.createElement("p");
  jatemconta.textContent = "ja possui uma conta?";
  formulario.appendChild(titulo);
  formulario.appendChild(inputnome);
  formulario.appendChild(inputsenha);
  formulario.appendChild(btn);
  formulario.appendChild(jatemconta);
  meuformulario.appendChild(formulario);
  document.body.appendChild(meuformulario);
  //   meuformulario.addEventListener("submit", () => {
  //     alert("deu submit");
  //     meuformulario.remove();
  //   });

  jatemconta.addEventListener("click", () => {
    if (meuformulario) {
      meuformulario.remove();
      Addloginview();
    }
  });
}
function Addloginview() {
  const meuformulario = document.createElement("div");
  meuformulario.id = "meu_formulario";
  const formulario = document.createElement("form");
  const titulo = document.createElement("h1");
  titulo.textContent = "Login";
  formulario.method = "POST";
  const inputnome = document.createElement("input");
  inputnome.type = "text";
  inputnome.name = "email_login";
  inputnome.placeholder = "digite o email de usuario";
  const inputsenha = document.createElement("input");
  inputsenha.type = "password";
  inputsenha.name = "senha_login";
  inputsenha.placeholder = "digite a sua senha";
  const btn = document.createElement("button");
  btn.textContent = "Logar";
  const semconta = document.createElement("p");
  semconta.textContent = "cadastre-se?";
  formulario.appendChild(titulo);
  formulario.appendChild(inputnome);
  formulario.appendChild(inputsenha);
  formulario.appendChild(btn);
  formulario.appendChild(semconta);
  meuformulario.appendChild(formulario);
  document.body.appendChild(meuformulario);
  semconta.addEventListener("click", () => {
    if (meuformulario) {
      meuformulario.remove();
      Addcadastroview();
    }
  });
}

setTimeout(() => {
  Addcadastroview();
}, 1000);

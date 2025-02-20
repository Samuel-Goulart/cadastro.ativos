document.getElementById("formCadastro").addEventListener("submit", function(event) {
    const senha = document.getElementById("senha").value;
    const regex = "/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/";  // Validação da senha

    // Se a senha não atender aos requisitos, mostrar erro e bloquear o envio
    if (!regex.test(senha)) {
        document.getElementById("erroSenha").textContent = "A senha deve ter pelo menos 8 caracteres, uma letra maiúscula e um número.";
        event.preventDefault();  // Impede o envio do formulário
    } else {
        document.getElementById("erroSenha").textContent = "";  // Limpa a mensagem de erro
    }
});

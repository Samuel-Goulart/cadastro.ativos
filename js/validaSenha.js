// script.js

function validarSenha() {
    // Captura o valor do campo de senha
    var senha = document.getElementById("senha").value;
    var erroSenha = document.getElementById("erroSenha");

    // Expressões regulares para validação
    var minLength = /.{8,}/;              // Pelo menos 8 caracteres
    var hasUpper = /[A-Z]/;                // Pelo menos uma letra maiúscula
    var hasLower = /[a-z]/;                // Pelo menos uma letra minúscula
    var hasNumber = /\d/;                  // Pelo menos um número
    var hasSpecial = /[!@#$%^&*(),.?":{}|<>]/; // Pelo menos um caractere especial

    // Validação
    if (!minLength.test(senha)) {
        erroSenha.textContent = "A senha deve ter pelo menos 8 caracteres.";
        return false;
    } else if (!hasUpper.test(senha)) {
        erroSenha.textContent = "A senha deve conter pelo menos uma letra maiúscula.";
        return false;
    } else if (!hasLower.test(senha)) {
        erroSenha.textContent = "A senha deve conter pelo menos uma letra minúscula.";
        return false;
    } else if (!hasNumber.test(senha)) {
        erroSenha.textContent = "A senha deve conter pelo menos um número.";
        return false;
    } else if (!hasSpecial.test(senha)) {
        erroSenha.textContent = "A senha deve conter pelo menos um caractere especial.";
        return false;
    } 
    document.getElementById("form").submit();

}

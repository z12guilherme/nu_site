// Captura o formulário
const loginForm = document.getElementById('loginForm');

// Evento de submissão do formulário
loginForm.addEventListener('submit', (e) => {
    e.preventDefault(); // Previne o reload da página

    // Captura os valores dos campos
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Simulação de validação
    if (email === "admin@nubank.com" && password === "1234") {
        alert("Login realizado com sucesso!");
    } else {
        alert("Credenciais inválidas. Tente novamente.");
    }
});

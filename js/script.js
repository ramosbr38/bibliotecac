console.log('JS carregado');

async function carregarMensagem() {
  try {
    const resp = await fetch('https://api.adviceslip.com/advice');
    const data = await resp.json();
    document.getElementById('api-msg').textContent = data.slip.advice;
  } catch (e) {
    console.error('Erro ao consumir API', e);
  }
}

if (document.getElementById('api-msg')) {
  carregarMensagem();
}

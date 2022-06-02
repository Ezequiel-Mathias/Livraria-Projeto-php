 const promoçoes = [
    {
        id: 1,
        nome: 'Do mil ao milhão',
        descricao: "Do mil ao milhão sem cortar o cafezinho",
        avaliacao: 5,
        preco:'R$ 78.90',
        parcelamento:'ou 4x sem juros',
        imagem: './imgsLivrosEmDestaque/domilaomilhao.webp',
        detalhes:'Do mil ao milhao' 
    
    },
    
    {
        id: 2,
        nome: 'Clean Code',
        descricao: "Para se tornar um melhor programador ",
        avaliacao: 5,
        preco:'R$ 98.00',
        parcelamento:'ou 4x sem juros',
        imagem: './imgsLivrosEmDestaque/cleancode.png',
        detalhes:'Clean code' 
        
    },
    
    {
        id: 3,
        nome: 'Pai Rico, Pai pobre',
        descricao: "Como dar mais valor ao dinheiro",
        avaliacao: 4,
        preco: 'R$ 53.10',
        parcelamento:'ou 4x sem juros',
        imagem: './imgsLivrosEmDestaque/pairico.webp',
        detalhes:'Pai rico, Pai pobre' 
        
    },




]

const definirAvaliacaoPromoçoes = (qtdCheias) => {
    const qtdVazias = 5 - qtdCheias


    return "&starf;".repeat(qtdCheias) + "&star;".repeat(qtdVazias)
}

const criarCardPromoçoes = (promoçoes) => {
    
    const card = document.createElement('div')
    card.classList.add('divcardpromoçoes')
    card.innerHTML = `
    <div class="divcardpromoçoes">
    <div class="card-img-container">
        <img src="${promoçoes.imagem}" alt="" class="card-image">
        </div>
        <span class="card-nome">${promoçoes.nome}</span>
        <span class="card-descricao">${promoçoes.descricao}</span>
        <span class="card-avaliacao">
        ${definirAvaliacaoPromoçoes(promoçoes.avaliacao)}
        </span>
        <span class="card-preco">${promoçoes.preco}</span>
        <span class="card-parcelamento">${promoçoes.parcelamento}</span>
        <div id="btndetalhes">Detalhes</div>
    </div>
   
    `
    return card
}


const carregarpromoçoes  =  (promoçoes) => {
    const conteiner = document.querySelector('.cardspromoçoes')
    const cards =  promoçoes.map(criarCard)

    conteiner.replaceChildren(...cards)
}


carregarpromoçoes(promoçoes)  
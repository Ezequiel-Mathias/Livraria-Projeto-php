/*****************************************************
* Objetivo: Fazer os Cards da categoria em Destaque !
* Autor: Ezequiel Mathias 
* Versão: 1.0
*****************************************************/

'use strict';


const produtosemdestaque = [
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

{
    id: 4,
    nome: 'Ultima Parada',
    descricao: "Um romance qualquer",
    avaliacao: 4,
    preco:'R$ 48.60',
    parcelamento:'ou 4x sem juros',
    imagem: './imgsLivrosEmDestaque/ultimaparada.png',
    detalhes:'Ultima Parada'  
},


{
    id: 5,
    nome: 'O medico da emoção',
    descricao: "Tratando a emoção",
    avaliacao: 3,
    preco:'R$ 30.80',
    parcelamento:'ou 4x sem juros',
    imagem: './imgsLivrosEmDestaque/omedicodaemoção.webp',
    detalhes:'O medico da emoção'  
},

{
    id: 6,
    nome: 'O milagre do amanhã',
    descricao: "sempre haverá esperança",
    avaliacao: 5,
    preco:'R$ 55.00',
    parcelamento:'ou 4x sem juros',
    imagem: './imgsLivrosEmDestaque/o-milagre-da-manhã.png',
    detalhes:'O milagre do amanha' 
},

{
    id: 7,
    nome: 'Sobrevivendo no Inferno',
    descricao: "Criticas Sociais",
    avaliacao: 5,
    preco:'R$ 60.00',
    parcelamento:'ou 4x sem juros',
    imagem: './imgsLivrosEmDestaque/sobrevivendonoinferno.jpg', 
    detalhes:'sobrevivendo no inferno'
},

]




const definirAvaliacao = (qtdCheias) => {
    const qtdVazias = 5 - qtdCheias


    return "&starf;".repeat(qtdCheias) + "&star;".repeat(qtdVazias)
}

const criarCard = (produtosemdestaque) => {
    
    const card = document.createElement('div')
    card.classList.add('divcard')
    card.innerHTML = `
    <div class="card-img-container">
        <img src="${produtosemdestaque.imagem}" alt="" class="card-image">
        </div>
        <span class="card-nome">${produtosemdestaque.nome}</span>
        <span class="card-descricao">${produtosemdestaque.descricao}</span>
        <span class="card-avaliacao">
            ${definirAvaliacao(produtosemdestaque.avaliacao)}
        </span>
        <span class="card-preco">${produtosemdestaque.preco}</span>
        <span class="card-parcelamento">${produtosemdestaque.parcelamento}</span>
        <div id="btndetalhes">Detalhes</div>
        
    `
    return card
}


const carregarprodutosemdestaque  =  (produtosemdestaque) => {
    const conteiner = document.querySelector('.cards')
    const cards =  produtosemdestaque.map(criarCard)

    conteiner.replaceChildren(...cards)
}


carregarprodutosemdestaque(produtosemdestaque) 

//animação slide card

const containerItems = document.querySelector('.cards');

let divcards = document.querySelectorAll('.divcard');

const previous = () => {
    containerItems.appendChild(divcards[0]);
    divcards = document.querySelectorAll('.divcard');
    
}

const next = () => {
    const lastItem = divcards[divcards.length - 1];
    containerItems.insertBefore(lastItem, divcards[0]);
    divcards = document.querySelectorAll('.divcard');
    
    
}

document.querySelector('#previous').addEventListener('click', previous);
document.querySelector('#next').addEventListener('click', next); 


/***/ 

const produtos = [
    {
        id: 1,
        nome: 'Do mil ao milhão',
        descricao: "Do mil ao milhão sem cortar o cafezinho",
        avaliacao: 5,
        preco:'R$ 78.90',
        parcelamento:'ou 4x sem juros',
        imagem: './imgsLivrosEmDestaque/pairico.webp'
    
    },
    
    {
        id: 2,
        nome: 'Clean Code',
        descricao: "Para se tornar um melhor programador ",
        avaliacao: 5,
        preco:'R$ 98.00',
        parcelamento:'ou 4x sem juros',
        imagem: './imgsLivrosEmDestaque/cleancode.png'
        
    },
    
    {
        id: 3,
        nome: 'Pai Rico, Pai pobre',
        descricao: "Como dar mais valor ao dinheiro",
        avaliacao: 4,
        preco: 'R$ 53.10',
        parcelamento:'ou 4x sem juros',
        imagem: './imgsLivrosEmDestaque/domilaomilhao.webp'
        
    },
    
    {
        id: 4,
        nome: 'Ultima Parada',
        descricao: "Um romance qualquer",
        avaliacao: 4,
        preco:'R$ 48.60',
        parcelamento:'ou 4x sem juros',
        imagem: './imgsLivrosEmDestaque/ultimaparada.png' 
    },
    {
        id: 5,
        nome: 'Clean Code',
        descricao: "Para se tornar um melhor programador ",
        avaliacao: 5,
        preco:'R$ 98.00',
        parcelamento:'ou 4x sem juros',
        imagem: './imgsLivrosEmDestaque/cleancode.png'
        
    },
    {
        id: 6,
        nome: 'Sobrevivendo no Inferno',
        descricao: "Criticas Sociais",
        avaliacao: 5,
        preco:'R$ 60.00',
        parcelamento:'ou 4x sem juros',
        imagem: './imgsLivrosEmDestaque/sobrevivendonoinferno.jpg', 
        detalhes:'sobrevivendo no inferno'
    },
    {
        id: 7,
        nome: 'O medico da emoção',
        descricao: "Tratando a emoção",
        avaliacao: 3,
        preco:'R$ 30.80',
        parcelamento:'ou 4x sem juros',
        imagem: './imgsLivrosEmDestaque/omedicodaemoção.webp',
        detalhes:'O medico da emoção'  
    },
    
    {
        id: 8,
        nome: 'O milagre do amanhã',
        descricao: "sempre haverá esperança",
        avaliacao: 5,
        preco:'R$ 55.00',
        parcelamento:'ou 4x sem juros',
        imagem: './imgsLivrosEmDestaque/o-milagre-da-manhã.png',
        detalhes:'O milagre do amanha' 
    },
    {
        id: 9,
        nome: 'O menino de pijama listrado',
        descricao: "Sobrevivendo ao nazismo",
        avaliacao: 5,
        preco:'R$ 80.10',
        parcelamento:'ou 4x sem juros',
        imagem: './imgsLivrosProdutos/pijama-listrado.png'
        
    },

    {
        id: 10,
        nome: 'Mais esperto que o diabo',
        descricao: "Pensar é a virada de chave",
        avaliacao: 5,
        preco:'R$ 47.90',
        parcelamento:'ou 4x sem juros',
        imagem: './imgsLivrosProdutos/Mais-esperto-que-o-Diabo.png'
        
    },
    {
        id: 11,
        nome: 'Em busca de nos mesmos',
        descricao: "Reflexão",
        avaliacao: 5,
        preco:'R$ 64.00',
        parcelamento:'ou 4x sem juros',
        imagem: './imgsLivrosProdutos/em-busca-de-nos-mesmos.png'
        
    },
    {
        id: 12,
        nome: 'A garota do lago',
        descricao: "Suspense",
        avaliacao: 5,
        preco:'R$ 108.00',
        parcelamento:'ou 4x sem juros',
        imagem: './imgsLivrosProdutos/a-garota-do-lago_3D.png'
        
    },
   
    
    ];
    
    const definirAvaliacaoProdutos = (qtdCheias) => {
        const qtdVazias = 5 - qtdCheias
    
    
        return "&starf;".repeat(qtdCheias) + "&star;".repeat(qtdVazias)
    }
    
    const criarCardProdutos  = (produtos) => {
        
        const card = document.createElement('div')
        card.classList.add('divcardprodutos')
        card.innerHTML = `
        
        <div class="divcardprodutos">
        <div class="card-img-container">
            <img src="${produtos.imagem}" alt="" class="card-image">
            </div>
            <span class="card-nome">${produtos.nome}</span>
            <span class="card-descricao">${produtos.descricao}</span>
            <span class="card-avaliacao">
            ${definirAvaliacaoProdutos(produtos.avaliacao)}
            </span>
            <span class="card-preco">${produtos.preco}</span>
            <span class="card-parcelamento">${produtos.parcelamento}</span>
            <div id="btndetalhes">Detalhes</div>
        </div>
       
        `
     
     return card
        
    }
    
    const carregarprodutos  =  (produtos) => {
        const conteiner = document.querySelector('.cardsprodutos')
        const cards =  produtos.map(criarCardProdutos)
    
        conteiner.replaceChildren(...cards)
    }
    
    
    carregarprodutos(produtos)
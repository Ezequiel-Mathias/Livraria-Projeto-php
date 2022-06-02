

'use strict';

const abrirModal = () =>{
    document.getElementById('modal-conteiner').classList.add('active')

}

const fecharModal = () =>{
    document.getElementById('modal-conteiner').classList.remove('active')
}




document.querySelectorAll('#btndetalhes').forEach(detalhes => detalhes.addEventListener('click', abrirModal))
document.getElementById('modal-conteiner').addEventListener('click',fecharModal)
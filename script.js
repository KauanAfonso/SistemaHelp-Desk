const btnPdf = document.querySelector("#pdf");

// quando botao for clicado
btnPdf.addEventListener("click" , () =>{

    //pega o conteudo do id conteudo(os chamados)
    const conteudo =document.querySelector("#conteudo");

    //config do pdf
    const options = {
        margin: [10,10,10,10],
        filename: "chamados.pdf",
        html2canvas:{scale: 2},
        jsPDF:{unit: "mm", format: "a4" , orientation: "portrait"}

    }

    //executar a funcao, set para configurar as opções e from para dizer qual o conteudo do pdf. Save é para salvar arquivo.
    html2pdf().set(options).from(conteudo).save();


}

    

);
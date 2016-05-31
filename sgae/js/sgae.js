function delUsuario(idusu) {
	ok = confirm("Voc&ecirc; tem certeza que deseja excluir este usu&aacute;rio?");
	if (ok) {
		location.href = "usuario_exec.php?act=delete&idusu="+idusu;
	}
}
/*
function clearForm(){
	d = document.form;
	d.reset();

	d.nome.focus();
	return false;
}

function verificaContato(){
	d = document.form1;
	
	if (d.nome.value == ""){
	alert("O campo nome deve ser preenchido!");
	d.nome.focus();
	return false;
	}	
	
	if( d.email.value=="" || d.email.value.indexOf('@')==-1 ||  d.email.value.indexOf('.')==-1 ) 
	{ 
	alert( "Preencha campo E-MAIL corretamente!" ); 
	d.email.focus(); 
	return false; 
	}
			
		
	
	
	if (d.tel.value == ""){
	alert("O campo telefone deve ser preenchido!");
	d.tel.focus();
	return false;
	}
	
	if (d.msg.value == ""){
	alert("Voce esqueceu de digitar a mensagem.");
	d.tel.focus();
	return false;
	}

}

function reactConvenio(idcon) {
	ok = confirm("Você tem certeza que deseja reativar este convênio?");
	if (ok) {
		location.href = "convenios_exec.php?act=react&idcon="+idcon;
	}
}

function delEspecialidade(idesp) {
	ok = confirm("Você tem certeza que deseja excluir esta especialidade?");
	if (ok) {
		location.href = "especialidades_exec.php?act=delete&idesp="+idesp;
	}
}

function reactEspecialidade(idesp) {
	ok = confirm("Você tem certeza que deseja reativar esta especialidade?");
	if (ok) {
		location.href = "especialidades_exec.php?act=react&idesp="+idesp;
	}
}

function delMedico(idmed) {
	ok = confirm("Você tem certeza que deseja excluir este médico?");
	if (ok) {
		location.href = "medicos_exec.php?act=delete&idmed="+idmed;
	}
}

function reactMedico(idmed) {
	ok = confirm("Você tem certeza que deseja reativar este médico?");
	if (ok) {
		location.href = "medicos_exec.php?act=react&idmed="+idmed;
	}
}

function delNoticia(idnot) {
	ok = confirm("Você tem certeza que deseja excluir esta notícia?");
	if (ok) {
		location.href = "noticias_exec.php?act=delete&idnot="+idnot;
	}
}

function reactNoticia(idnot) {
	ok = confirm("Você tem certeza que deseja reativar esta notícia?");
	if (ok) {
		location.href = "noticias_exec.php?act=react&idnot="+idnot;
	}
}

function verificaNews(){
	d = document.form_rodape;
	if( d.email.value=="" || d.email.value.indexOf('@')==-1 ||  d.email.value.indexOf('.')==-1 ) 
	{ 
	alert( "Preencha campo E-MAIL corretamente!" ); 
	d.email.focus(); 
	return false; 
	}
}

function maskIt(w,e,m,r,a){



// Cancela se o evento for Backspace

if (!e) var e = window.event

if (e.keyCode) code = e.keyCode;

else if (e.which) code = e.which;



// Variáveis da função

var txt = (!r) ? w.value.replace(/[^\d]+/gi,'') : w.value.replace(/[^\d]+/gi,'').reverse();

var mask = (!r) ? m : m.reverse();

var pre = (a ) ? a.pre : "";

var pos = (a ) ? a.pos : "";

var ret = "";



if(code == 9 || code == 8 || txt.length == mask.replace(/[^#]+/g,'').length) return false;



// Loop na máscara para aplicar os caracteres

for(var x=0,y=0, z=mask.length;x<z && y<txt.length;){

if(mask.charAt(x)!='#'){

ret += mask.charAt(x); x++;

} else{

ret += txt.charAt(y); y++; x++;

}

}



// Retorno da função

ret = (!r) ? ret : ret.reverse()

w.value = pre+ret+pos;

}



// Novo método para o objeto 'String'

String.prototype.reverse = function(){

return this.split('').reverse().join('');

};


function verificaCadastroCliente(){
	d = document.cadastro_cliente;
	
	if (d.nome.value == ""){
	alert("O campo nome deve ser preenchido!");
	d.nome.focus();
	return false;
	}
	
	if (d.email.value == ""){
	alert("O campo email deve ser preenchido!");
	d.email.focus();
	return false;
	}
		
	if (d.rg.value != "" && d.orgao.value == ""){
	alert("O campo Orgao Expedidor deve ser informado!");
	d.orgao.focus();
	return false;
	}
	
	if( d.email.value=="" || d.email.value.indexOf('@')==-1 ||  d.email.value.indexOf('.')==-1 ) 
	{ 
	alert( "Preencha campo E-MAIL corretamente!" ); 
	d.email.focus(); 
	return false; 
	}
	
	if (d.email2.value != d.email.value){
	alert("O email nao foi repetido corretamente!");
	d.email2.focus();
	return false;
	}

	if (d.senha.value == ""){
	alert("O campo senha deve ser preenchido!");
	d.senha.focus();
	return false;
	}

	if (d.senha2.value != d.senha.value){
	alert("A senha nao foi repetida corretamente!");
	d.senha2.focus();
	return false;
	}
	//validar data de nascimento
erro=0;
hoje = new Date();
anoAtual = hoje.getFullYear();
barras = d.data_nasc.value.split("/");
if (barras.length == 3){
dia = barras[0];
mes = barras[1];
ano = barras[2];
resultado = (!isNaN(dia) && (dia > 0) && (dia < 32)) && (!isNaN(mes) && (mes > 0) && (mes < 13)) && (!isNaN(ano) && (ano.length == 4) && (ano <= anoAtual && ano >= 1900));
if (!resultado) {
alert("Formato de data invalido!");
d.data_nasc.focus();
return false;
}
} else {
alert("Formato de data invalido!");
d.data_nasc.focus();
return false;
}

if (d.end.value == ""){
	alert("O campo endereco deve ser preenchido!");
	d.end.focus();
	return false;
	}
		
	if (d.cep.value == ""){
	alert("O campo CEP deve ser preenchido!");
	d.cep.focus();
	return false;
	}
	cel = d.cel.value;
	lencel = cel.length;
	
	if (d.cel.value == "" ||  isNaN(cel) || lencel < 8){
	alert("O campo telefone celular deve ser preenchido !");
	d.cel.focus();
	return false;
	}
	
	dddcel = d.ddd_cel.value;
	lendddcel = dddcel.length;
	
	if (d.ddd_cel.value == "" ||lendddcel < 2 ||  isNaN(dddcel) ){
	alert("O campo ddd do telefone celular deve ser preenchido corretamente!");
	d.ddd_cel.focus();
	return false;
	}
	
	

	
	if (d.ddd_tel.value == "" && d.tel.value != ""){
	alert("O campo ddd do telefone convencional deve ser preenchido!");
	d.ddd_tel.focus();
	return false;
	}
	
	tel = d.tel.value;
	lentel = tel.length;
	
	dddtel = d.ddd_tel.value;
	lendddtel = dddtel.length;
	
	if (lendddtel < 2 && d.tel.value != ""){
	alert("O campo ddd do telefone convencional deve ter 2 digitos!");
	d.ddd_tel.focus();
	return false;
	}
	
	if (d.tel.value != "" && isNaN(dddtel) ){
	alert("O campo ddd do telefone convencional deve ter apenas numeros!");
	d.ddd_tel.focus();
	return false;
	}
	
	
	if (d.tel.value != "" && isNaN(tel) ){
	alert("O campo de telefone convencional deve ter apenas numeros!");
	d.tel.focus();
	return false;
	}
	
		if ( lentel < 8 ){
	alert("O campo de telefone convencional deve ter mais do que 7 digitos!");
	d.tel.focus();
	return false;
	}
		
	if (d.cidade.value == ""){
	alert("O campo cidade deve ser preenchido!");
	d.cidade.focus();
	return false;
	}

	if (d.uf.value == ""){
	alert("O campo UF deve ser preenchido!");
	d.uf.focus();
	return false;
	}
	
	rg = d.rg.value;
	
	if (d.rg.value == ""){
	alert("O campo RG deve ser preenchido!");
	d.rg.focus();
	return false;
	}
	
	if ( isNaN(rg) ){
	alert("O campo RG deve ter apenas numeros!");
	d.rg.focus();
	return false;
	}
	
	
	
var cpf = d.cpf.value;
        exp = /\.|\-/g
        cpf = cpf.toString().replace( exp, "" ); 
        var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
        var soma1=0, soma2=0;
        var vlr =11;

        for(i=0;i<9;i++){
                soma1+=eval(cpf.charAt(i)*(vlr-1));
                soma2+=eval(cpf.charAt(i)*vlr);
                vlr--;
        }       
        soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
        soma2=(((soma2+(2*soma1))*10)%11);

        var digitoGerado=(soma1*10)+soma2;
        if(digitoGerado!=digitoDigitado)   {     
                alert('CPF Invalido!');  
				d.cpf.focus(); 
				return false;
		} else {
				return true;	
		}
}

function verificaCadastroCliente2(){
	d = document.cadastro_cliente;
	
	if (d.nome.value == ""){
	alert("O campo nome deve ser preenchido!");
	d.nome.focus();
	return false;
	}
	

	if (d.rg.value != "" && d.orgao.value == ""){
	alert("O campo Orgao Expedidor deve ser informado!");
	d.orgao.focus();
	return false;
	}
	




	if (d.senha.value != "" && d.senha2.value != d.senha.value){
	alert("A senha nao foi repetida corretamente!");
	d.senha2.focus();
	return false;
	}
	//validar data de nascimento
erro=0;
hoje = new Date();
anoAtual = hoje.getFullYear();
barras = d.data_nasc.value.split("/");
if (barras.length == 3){
dia = barras[0];
mes = barras[1];
ano = barras[2];
resultado = (!isNaN(dia) && (dia > 0) && (dia < 32)) && (!isNaN(mes) && (mes > 0) && (mes < 13)) && (!isNaN(ano) && (ano.length == 4) && (ano <= anoAtual && ano >= 1900));
if (!resultado) {
alert("Formato de data invalido!");
d.data_nasc.focus();
return false;
}
} else {
alert("Formato de data invalido!");
d.data_nasc.focus();
return false;
}

if (d.end.value == ""){
	alert("O campo endereco deve ser preenchido!");
	d.end.focus();
	return false;
	}
		
	if (d.cep.value == ""){
	alert("O campo CEP deve ser preenchido!");
	d.cep.focus();
	return false;
	}
	cel = d.cel.value;
	lencel = cel.length;
	
	if (d.cel.value == "" ||  isNaN(cel) || lencel < 8){
	alert("O campo telefone celular deve ser preenchido !");
	d.cel.focus();
	return false;
	}
	
	dddcel = d.ddd_cel.value;
	lendddcel = dddcel.length;
	
	if (d.ddd_cel.value == "" ||lendddcel < 2 ||  isNaN(dddcel) ){
	alert("O campo ddd do telefone celular deve ser preenchido corretamente!");
	d.ddd_cel.focus();
	return false;
	}
	
	

	
	if (d.ddd_tel.value == "" && d.tel.value != ""){
	alert("O campo ddd do telefone convencional deve ser preenchido!");
	d.ddd_tel.focus();
	return false;
	}
	
	tel = d.tel.value;
	lentel = tel.length;
	
	dddtel = d.ddd_tel.value;
	lendddtel = dddtel.length;
	
	if (lendddtel < 2 && d.tel.value != ""){
	alert("O campo ddd do telefone convencional deve ter 2 digitos!");
	d.ddd_tel.focus();
	return false;
	}
	
	if (d.tel.value != "" && isNaN(dddtel) ){
	alert("O campo ddd do telefone convencional deve ter apenas numeros!");
	d.ddd_tel.focus();
	return false;
	}
	
	
	if (d.tel.value != "" && isNaN(tel) ){
	alert("O campo de telefone convencional deve ter apenas numeros!");
	d.tel.focus();
	return false;
	}
	
		if ( lentel < 8 ){
	alert("O campo de telefone convencional deve ter mais do que 7 digitos!");
	d.tel.focus();
	return false;
	}
		
	if (d.cidade.value == ""){
	alert("O campo cidade deve ser preenchido!");
	d.cidade.focus();
	return false;
	}

	if (d.uf.value == ""){
	alert("O campo UF deve ser preenchido!");
	d.uf.focus();
	return false;
	}
	
	rg = d.rg.value;
	
	if (d.rg.value == ""){
	alert("O campo RG deve ser preenchido!");
	d.rg.focus();
	return false;
	}
	
	if ( isNaN(rg) ){
	alert("O campo RG deve ter apenas numeros!");
	d.rg.focus();
	return false;
	}
	


	
}

function verificaLogin() {
d = document.form_login;
		
	if (d.email.value == ""){
	alert("Informe o e-mail cadastrado.");
	d.email.focus();
	return false;
	}
	
	if (d.senha.value == ""){
	alert("Informe sua senha.");
	d.senha.focus();
	return false;
	}
	
}



function verificaFormPassageiro(){
	d = document.cadastro_cliente;
	
	if (d.nome.value == ""){
	alert("O campo nome deve ser preenchido!");
	d.nome.focus();
	return false;
	}
		
	if (d.rg.value != "" && d.org_exp.value == ""){
	alert("O campo Orgao Expedidor deve ser informado!");
	d.org_exp.focus();
	return false;
	}


	//validar data de nascimento
erro=0;
hoje = new Date();
anoAtual = hoje.getFullYear();
barras = d.data_nasc.value.split("/");
if (barras.length == 3){
dia = barras[0];
mes = barras[1];
ano = barras[2];
resultado = (!isNaN(dia) && (dia > 0) && (dia < 32)) && (!isNaN(mes) && (mes > 0) && (mes < 13)) && (!isNaN(ano) && (ano.length == 4) && (ano <= anoAtual && ano >= 1900));
if (!resultado) {
alert("Formato de data invalido!");
d.data_nasc.focus();
return false;
}
} else {
alert("Formato de data invalido!");
d.data_nasc.focus();
return false;
}

	

}

function confirmRemover() {
	ok = confirm("Deseja realmente remover este item do carrinho? Aperte OK para confirmar.");
	if (ok) {
		return true;
	} else {
	return false;	
	}
}


function confirmPedido() {
	ok = confirm("Prosseguir com o pedido e encaminhar para o pagamento? Aperte OK para confirmar.");
	if (ok) {
		return true;
	} else {
	return false;	
	}
}

function confirmLimp() {
	ok = confirm("Voce tem certeza que deseja limpar seu carrinho? Aperte OK para confirmar.");
	if (ok) {
		return true;
	} else {
	return false;	
	}
}

function confirmCancel() {
	ok = confirm("Voce tem certeza que deseja cancelar este passeio? Aperte OK para confirmar o cancelamento.");
	if (ok) {
		return true;
	} else {
	return false;	
	}
}

function confirmCancelTransf() {
	ok = confirm("Voce tem certeza que deseja cancelar este transfer? Aperte OK para confirmar o cancelamento.");
	if (ok) {
		return true;
	} else {
	return false;	
	}
}


function verificaAddCarrinho() {
d = document.form;
		
	if (d.li_e_aceito.checked == false){
	alert("Voce deve aceitar os termos de compras para prosseguir.");
	d.li_e_aceito.focus();
	return false;
	}
	
}

function delPassageiro(idpas, data_passeio, idp) {
	ok = confirm("Voce tem certeza que deseja excluir este passageiro?");
	if (ok) {
		location.href = "passageiros_exec.php?act=delete&idp="+idp+"&idpas="+idpas+"&data_passeio="+data_passeio;
	}
}

function delPassageiroCar(idpas, data_passeio, idp) {
	ok = confirm("Voce tem certeza que deseja excluir este passageiro do passeio?");
	if (ok) {
		location.href = "passageiros_exec.php?act=delete_car&idp="+idp+"&idpas="+idpas+"&data_passeio="+data_passeio;
	}
}

function delPassageiroT(idpas, data_transfer, idt) {
	ok = confirm("Voce tem certeza que deseja excluir este passageiro do transfer?");
	if (ok) {
		location.href = "passageiros_exec.php?act=delete_transf&idt="+idt+"&idpas="+idpas+"&data_transfer="+data_transfer;
	}
}

function delPassageiroCarT(idpas, data_transfer, idt) {
	ok = confirm("Voce tem certeza que deseja excluir este passageiro do trasnfer?");
	if (ok) {
		location.href = "passageiros_exec.php?act=delete_transf_car&idt="+idt+"&idpas="+idpas+"&data_transfer="+data_transfer;
	}
}

function delEvento(ideve) {
	ok = confirm("Voce tem certeza que deseja excluir este evento?");
	if (ok) {
		location.href = "eventos_exec.php?act=delete&ideve="+ideve;
	}
}



function reactEvento(ideve) {
	ok = confirm("Voce tem certeza que deseja reativar este evento?");
	if (ok) {
		location.href = "eventos_exec.php?act=react&ideve="+ideve;
	}
}

function verificaFormPasseio(){
	d = document.form;
		

	//validar data de nascimento
erro=0;
hoje = new Date();
anoAtual = hoje.getFullYear();
barras = d.data_passeio.value.split("/");
if (barras.length == 3){
dia = barras[0];
mes = barras[1];
ano = barras[2];
resultado = (!isNaN(dia) && (dia > 0) && (dia < 32)) && (!isNaN(mes) && (mes > 0) && (mes < 13)) && (!isNaN(ano) && (ano.length == 4) && (ano <= anoAtual && ano >= 1900));
if (!resultado) {
alert("Formato de data invalido!");
d.data_passeio.focus();
return false;
}
} else {
alert("Formato de data invalido!");
d.data_passeio.focus();
return false;
}

	



}


function verificaFormTransfer(){
	d = document.form;

		
	if (d.origem_transfer.value == d.destino_transfer.value ){
	alert("Selecione um destino diferente da origem!");
	d.origem_transfer.focus();
	return false;
	}
		
	if (d.origem_transfer.value == 1 && d.destino_transfer.value == 2 ){
	alert("Nao fazemos transfer de aeroporto para rodoviaria");
	d.destino_transfer.focus();
	return false;
	}
	
	if (d.origem_transfer.value == 2 && d.destino_transfer.value == 1 ){
	alert("Nao fazemos transfer de rodoviaria para aeroporto");
	d.origem_transfer.focus();
	return false;
	}

	//validar data de nascimento
erro=0;
hoje = new Date();
anoAtual = hoje.getFullYear();
barras = d.data_transfer.value.split("/");
if (barras.length == 3){
dia = barras[0];
mes = barras[1];
ano = barras[2];
resultado = (!isNaN(dia) && (dia > 0) && (dia < 32)) && (!isNaN(mes) && (mes > 0) && (mes < 13)) && (!isNaN(ano) && (ano.length == 4) && (ano <= anoAtual && ano >= 1900));
if (!resultado) {
alert("Formato de data invalido!");
d.data_transfer.focus();
return false;
}
} else {
alert("Formato de data invalido!");
d.data_transfer.focus();
return false;
}

*/	



}

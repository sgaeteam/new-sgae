<?php
if (isset($_REQUEST['msg'])) {
	$msg = $_REQUEST['msg'];
	
	switch ($msg) 
	{
		case md5(001):
			echo utf8_encode('Usu&aacute;rio ou senha inv&aacute;lida');
			break;
			
		case md5(002):
			echo utf8_encode('Preencha os dados do formul&aacute;rio corretamente');
			break;
			
		case md5(003):
			echo utf8_encode('Fa&ccedil;a o login primeiro');
			break;
			
		case md5(004):
			echo utf8_encode('Voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar esta p&aacute;gina!');
			break;
			
		case md5(100):
			echo utf8_encode('N&atilde;o autorizado!');
			break;			
		
		case md5(101):
                        echo utf8_encode('Usu&aacute;rio alterado com sucesso');
			break;
				
		case md5(102):
                        echo utf8_encode('Usu&aacute;rio exclu&iacute;do com sucesso');
			break;
			
		case md5(103):
                        echo utf8_encode('Usu&aacute;rio reativado com sucesso');
			break;

		case md5(104):
                        echo utf8_encode('Usu&aacute;rio inserido com sucesso');
			break;

		case md5(201):
                        echo utf8_encode('P&aacute;gina alterada com sucesso');
			break;
				
		case md5(202):
                        echo utf8_encode('P&aacute;gina exclu&iacute;da com sucesso');
			break;
			
		case md5(203):
                        echo utf8_encode('P&aacute;gina j&aacute; cadastrada');
			break;

		case md5(204):
                        echo utf8_encode('P&aacute;gina inserida com sucesso');
			break;
			
		case md5(205):
                        echo utf8_encode('Acesso exclu&iacute;do com sucesso');
			break;			
			
		case md5(206):
                        echo utf8_encode('Acesso(s) inserido(s) com sucesso');
			break;			

		case md5(211):
                        echo utf8_encode('Plano alterado com sucesso');
			break;
				
		case md5(212):
                        echo utf8_encode('Plano exclu&iacute;do com sucesso');
			break;
			
		case md5(213):
                        echo utf8_encode('Plano reativado com sucesso');
			break;

		case md5(214):
                        echo utf8_encode('Plano inserido com sucesso');
			break;

		case md5(221):
                        echo utf8_encode('Perfil alterado com sucesso');
			break;
				
		case md5(222):
                        echo utf8_encode('Perfil exclu&iacute;do com sucesso');
			break;
			
		case md5(223):
                        echo utf8_encode('Perfil reativado com sucesso');
			break;

		case md5(224):
                        echo utf8_encode('Perfil inserido com sucesso');
			break;

                case md5(313):
                        echo utf8_encode('A extensao da foto precisa ser JPG, GIF ou PNG');
			break;
		                    
		case md5(535):
                        echo utf8_encode('Usu&aacute;rio inserido com sucesso');
			break;
			
		case md5(536):
                        echo utf8_encode('Cadastro realizado com sucesso!');
			break;
			
		case md5(5366):
                        echo utf8_encode('N&atilde;o utilize aspas no campo de e-mail');
			break;
			
		case md5(537):
                        echo utf8_encode('Cadastro atualizado com sucesso!');
			break;
			
		case md5(540):
                        echo utf8_encode('Pedido realizado com sucesso... aguarde redirecionamento para o servi&ccedil;o de pagamento.');
			break;
			
		case md5(555):
                        echo utf8_encode('E-mail j&aacute; cadastrado em nosso sistema!');
			break;
			
		case md5(556):
			echo utf8_encode('CPF j&aacute; cadastrado em nosso sistema!');
			break;			
			
		case md5(700):
                        echo utf8_encode('Carrinho esvaziado com sucesso!');
                        break;
		
		case md5(800):
                        echo utf8_encode('Voc&ecirc; deve cadastrar as datas de nascimento de todos os passageiros para prosseguir.');
                        break;
	
		case md5(701):
                        echo utf8_encode('Mensagem enviada para lixeira com sucesso!');
                        break;
		
		case md5(702):
                        echo utf8_encode('Passageiro alterado com sucesso!');
                        break;
		
		case md5(707):
                        echo utf8_encode('Passageiro inserido com sucesso!!');
                        break;
		
		case md5(708):
                        echo utf8_encode("Voc&ecirc; est&aacute; utilizando caracteres inv&aacute;lidos. Retire as aspas simples ( ' ) do login e tente novamente.");
                        break;
		
	}	
}
?>

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		$this->call('BademailTableSeeder');
	}

}

class BademailTableSeeder extends Seeder{

	public function run(){

		$emails_bloqueados = array(
			'naoresponda@maladireta.inf',
			'naoresponda@mdbrasil.com',
			'upsdcampanha@gmail.com',
			'vendas2@especialistadigital.com.br',
			'atendimentohd3@uol.com.br',
			'megaemails@yahoo.com.br',
			'naoresponder@portaltapejara.com.br',
			'edson@decaprio.com.br',
			'eduardo@portubrasil.com.br',
			'mark357177@hotmail.com',
			'comercial@bmxsites.com.br',
			'megafestasomeiluminacao6@gmail.com',
			'bomdia@ag206.com.br',
			'divulgamaisff@gmail.com',
			'divulgamaisaa@gmail.com',
			'edileusa@rrjservicos.com.br',
			'alexcastello@a2solucoes.com',
			'thiagomateutec@gmail.com',
			'naoresponderplaspipas@gmail.com',
			'bellapinturamarcio@gmail.com',
			'adriano@bmxsites.com.br',
			'sergio-dalves@hotmail.com',
			'salathiel.dias@corecount.com.br',
			'contato@corpsolutions.com.br',
			'divulgamaisee@gmail.com',
			'josemaria.ribeiro59@hotmail.com',
			'marketing2@elevabrasil.com.br',
			'renatareginare@gmail.com',
			'anacarolinashinoda@gmail.com',
			'contato@pamelatheml.com.br',
			'rdantas@superbit.net',
			'contatocelular@zipmail.com.br',
			'naoresponder@estruturaspremoldada.com.br',
			'patricia.inovanet@gmail.com',
			'patricia.inovnet@gmail.com',
			'barrocartemoveisrusticos@gmail.com',
			'lgvg10@gmail.com',
			'info9908@bol.com.br',
			'info9906@bol.com.br',
			'iranjunior1980@gmail.com',
			'camilinhacosta1@hotmail.com',
			'fabiometa99@gmail.com',
			'fabriciopnet@gmail.com',
			'gabrielsousa1908@hotmail.com',
			'cursos@cursosdesucesso.net.br',
			'newsletter@forumeiros.com',
			'nao_responde@gmail.com',
			'info9902@bol.com.br',
			'canecasesurpresas@gmail.com',
			'naoresponda@capitalsaude.com.br',
			'contato@bmxsites.com.br',
			'info9910@bol.com.br',
			'info9907@bol.com.br',
			'naoresponda@crianca1000.org',
			'comercial@projetoweb.com.br',
			'vendas3@hyperlim.com.br',
			'atendimento.primeirapagina@gmail.com',
			'megacursos2016@gmail.com',
			'pradivulgarsite@gmail.com',
			'contato@whatsappexpert.com.br',
			'info9904@bol.com.br',
			'midia.negocios@newbrasilpublicidade.com.br',
			'guiade_publicidade@hotmail.com',
			'publicidade@boaopcao.com.br',
			'megakitenem2016@bol.com.br',
			'smartvideoa@bol.com.br',
			'mkt3@bhgrafica.com',
			'josemariacostafilho@yahoo.com.br',
			'smartvideob@bol.com.br',
			'cibele@dwftoys.com.br',
			'comercial@cluberetro.net',
			'edirdg2016@gmail.com',
			'contato10@brasilamericaexpress.com.br',
			'crievenda@yahoo.com.br',
			'miguelempresariodivulgador@gmail.com',
			'luiz@sitesbmx.com',
			'info9901@bol.com.br',
			'egterraplenagem@hotmail.com',
			'luiz@bmxsites.com.br',
			'videonosite@bol.com.br',
			'grupogpmx@gmail.com',
			'creditojato@gmail.com',
			'mkt03@bhgrafica.com',
			'chathelp@bol.com.br',
			'liviafaria81@yahoo.com.br',
			'naoresponder@cluberetro.net'
		);

		foreach ($emails_bloqueados as $email) {

			$bademail = new \App\Bademail();

			$bademail->email = $email;
			$bademail->save();

		}
	}
}

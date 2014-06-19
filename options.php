<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order,number=-1');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// Pull all the posts into an array
	$options_posts = array();
	$options_posts_obj = get_posts('sort_column=post_parent,menu_order');
	$options_posts[''] = 'Selecione um Post:';
	foreach ($options_posts_obj as $post) {
		$options_posts[$post->ID] = $post->post_title;
	}

	// Options Cabecalho
	$options[] = array(
		'name' => 'Cabeçalho',
		'type' => 'heading');

	// Start | Options Home [ 'FRASE FOOTER' ]
	$options[] = array(
		'name' => 'Footer',
		'type' => 'heading');

	$options[] = array(
		'name' => 'Direitos Reservados',
		'desc' => 'Adicione uma frase sobre os direitos reservados',
		'id' => 'perfil_law',
		'std' => '',
		'type' => 'text');
	// End | Options Home [ 'FRASE FOOTER' ]

	// Start | Options Home [ 'REDES SOCIAIS' ]
$options[] = array(
		'name' => 'Introdução',
		'type' => 'heading');

	$options[] = array(
		'name' => 'Ícone Criação',
		'desc' => 'Faça upload do ícone de Criação. Dimensões: 70x70px',
		'id' => 'icone_criacao',
		'type' => 'upload');

	$options[] = array(
		'name' => 'Link Criação',
		'desc' => 'Adicione o link de Criação',
		'id' => 'link_criacao',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => 'Descrição Criação',
		'desc' => 'Adicione a descrição de Criação',
		'id' => 'desc_criacao',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => 'Ícone Galeria',
		'desc' => 'Faça upload do ícone de Galeria. Dimensões: 70x70px',
		'id' => 'icone_galeria',
		'type' => 'upload');

	$options[] = array(
		'name' => 'Link Galeria',
		'desc' => 'Adicione o link de Galeria',
		'id' => 'link_galeria',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => 'Descrição Galeria',
		'desc' => 'Adicione a descrição de Galeria',
		'id' => 'desc_galeria',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => 'Ícone Loja',
		'desc' => 'Faça upload do ícone de Loja. Dimensões: 70x70px',
		'id' => 'icone_loja',
		'type' => 'upload');

	$options[] = array(
		'name' => 'Link Loja',
		'desc' => 'Adicione o link de Loja',
		'id' => 'link_loja',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => 'Descrição Loja',
		'desc' => 'Adicione a descrição de Loja',
		'id' => 'desc_loja',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => 'Ícone Blog',
		'desc' => 'Faça upload do ícone de Blog. Dimensões: 70x70px',
		'id' => 'icone_blog',
		'type' => 'upload');

	$options[] = array(
		'name' => 'Link Blog',
		'desc' => 'Adicione o link de Blog',
		'id' => 'link_blog',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => 'Descrição Blog',
		'desc' => 'Adicione a descrição de Blog',
		'id' => 'desc_blog',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => 'Ícone Contato',
		'desc' => 'Faça upload do ícone de Contato. Dimensões: 70x70px',
		'id' => 'icone_contato',
		'type' => 'upload');

	$options[] = array(
		'name' => 'Link Contato',
		'desc' => 'Adicione o link de Contato',
		'id' => 'link_contato',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => 'Descrição Contato',
		'desc' => 'Adicione a descrição de Contato',
		'id' => 'desc_contato',
		'std' => '',
		'type' => 'textarea');













	$options[] = array(
		'name' => 'Geral',
		'type' => 'heading');

	$options[] = array(
		'name' => 'Perfil Facebook',
		'desc' => 'Adicione o Perfil do Facebook',
		'id' => 'perfil_facebook',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => 'Perfil Instagran',
		'desc' => 'Adicione o Perfil do Instagran',
		'id' => 'perfil_instagram',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => 'Perfil Twitter',
		'desc' => 'Adicione o Perfil do Twitter',
		'id' => 'perfil_twitter',
		'std' => '',
		'type' => 'text');
	// End | Options Home [ 'REDES SOCIAIS' ]
	
	// Options Home
	$options[] = array(
		'name' => 'Home',
		'type' => 'heading');

	$options[] = array(
		'name' => 'Bloco de Destaques da Home',
		'desc' => '',
		'type' => 'info');

	$options[] = array(
		'name' => '',
		'desc' => 'Exibir os Blocos de Destaques na Home?',
		'id' => 'exibir_destaques_checkbox',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => 'Primeiro Bloco',
		'desc' => '',
		'type' => 'info');

	$options[] = array(
		'name' => 'Ícone',
		'desc' => 'Faça upload do ícone para o primeiro destaque. Dimensões: 120x90px',
		'id' => 'icon_feature_upload_um',
		'type' => 'upload');

	$options[] = array(
		'name' => 'Título',
		'desc' => 'Adicione o título para o primeiro destaque',
		'id' => 'title_feature_um',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => 'Resumo',
		'desc' => 'Adicione um breve resumo para o primeiro destaque',
		'id' => 'resumo_feature_um',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => 'Link do Primeiro Bloco',
		'desc' => 'Adicione aqui a URL para onde o primeiro bloco deve apontar. Lembre-se de adicionar o http://',
		'id' => 'link_box_um',
		'std' => '',
		'type' => 'text');


	$options[] = array(
		'name' => 'Segundo Bloco',
		'desc' => '',
		'type' => 'info');

	$options[] = array(
		'name' => 'Ícone',
		'desc' => 'Faça upload do ícone para o segundo destaque. Dimensões: 120x90px',
		'id' => 'icon_feature_upload_dois',
		'type' => 'upload');

	$options[] = array(
		'name' => 'Título',
		'desc' => 'Adicione o título para o segundo destaque',
		'id' => 'title_feature_dois',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => 'Resumo',
		'desc' => 'Adicione um breve resumo para o segundo destaque',
		'id' => 'resumo_feature_dois',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => 'Link do Segundo Bloco',
		'desc' => 'Adicione aqui a URL para onde o primeiro bloco deve apontar. Lembre-se de adicionar o http://',
		'id' => 'link_box_dois',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => 'Terceiro Bloco',
		'desc' => '',
		'type' => 'info');

	$options[] = array(
		'name' => 'Ícone',
		'desc' => 'Faça upload do ícone para o terceiro destaque. Dimensões: 120x90px',
		'id' => 'icon_feature_upload_tres',
		'type' => 'upload');

	$options[] = array(
		'name' => 'Título',
		'desc' => 'Adicione o título para o terceiro destaque',
		'id' => 'title_feature_tres',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => 'Resumo',
		'desc' => 'Adicione um breve resumo para o terceiro destaque',
		'id' => 'resumo_feature_tres',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => 'Link do Terceiro Bloco',
		'desc' => 'Adicione aqui a URL para onde o primeiro bloco deve apontar. Lembre-se de adicionar o http://',
		'id' => 'link_box_tres',
		'std' => '',
		'type' => 'text');
	
	$options[] = array(
		'name' => 'Quarto Bloco',
		'desc' => '',
		'type' => 'info');

	$options[] = array(
		'name' => 'Ícone',
		'desc' => 'Faça upload do ícone para o quarto destaque. Dimensões: 120x90px',
		'id' => 'icon_feature_upload_quatro',
		'type' => 'upload');

	$options[] = array(
		'name' => 'Título',
		'desc' => 'Adicione o título para o quarto destaque',
		'id' => 'title_feature_quatro',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => 'Resumo',
		'desc' => 'Adicione um breve resumo para o quarto destaque',
		'id' => 'resumo_feature_quatro',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => 'Link do Quarto Bloco',
		'desc' => 'Adicione aqui a URL para onde o primeiro bloco deve apontar. Lembre-se de adicionar o http://',
		'id' => 'link_box_quatro',
		'std' => '',
		'type' => 'text');


	return $options;
}

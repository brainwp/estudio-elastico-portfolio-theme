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

	return $options;
}

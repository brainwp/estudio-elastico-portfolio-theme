<?php 
	/* Template Name: Introdução */
	get_header( 'intro' ); 
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="tarja">
	<div class="conteudo">
		<?php if( get_option('custom_logo') ) : ?>
			<a class="logo" href="<?php echo home_url(); ?>">
				<img src="<?php echo get_option('custom_logo'); ?>" alt="<?php echo get_option('custom_logo_alt_text'); ?>" class="retina" />
			</a>
		<?php else : ?>
			<a class="logo" href="<?php echo home_url(); ?>">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-estudio-elastico.png" alt="Estúdio Elástico" class="retina" />
			</a>
		<?php endif; ?>

		<small><?php the_content(); ?></small>
		
		<?php
			$icon_criacao = of_get_option( 'icone_criacao' );
			$link_criacao = of_get_option( 'link_criacao' );
			$desc_criacao = of_get_option( 'desc_criacao' );
		?>
		
		<?php if(!empty($icon_criacao)) : ?>
			<div title="<?php echo $desc_criacao; ?>" class="icon" style="background-image: url(<?php echo $icon_criacao; ?>)">
				<a class="link" href="<?php echo $link_criacao; ?>"></a>
			</div>
		<?php endif; ?>

		<?php
			$icon_galeria = of_get_option( 'icone_galeria' );
			$link_galeria = of_get_option( 'link_galeria' );
			$desc_galeria = of_get_option( 'desc_galeria' );
		?>

		<?php if(!empty($icon_galeria)) : ?>
			<div title="<?php echo $desc_galeria; ?>" class="icon" style="background-image: url(<?php echo $icon_galeria; ?>)">
				<a class="link" href="<?php echo $link_galeria; ?>"></a>
			</div>
		<?php endif; ?>

		<?php
			$icon_loja = of_get_option( 'icone_loja' );
			$link_loja = of_get_option( 'link_loja' );
			$desc_loja = of_get_option( 'desc_loja' );
		?>

		<?php if(!empty($icon_loja)) : ?>
			<div title="<?php echo $desc_loja; ?>" class="icon" style="background-image: url(<?php echo $icon_loja; ?>)">
				<a class="link" href="<?php echo $link_loja; ?>"></a>
			</div>
		<?php endif; ?>

		<?php
			$icon_blog = of_get_option( 'icone_blog' );
			$link_blog = of_get_option( 'link_blog' );
			$desc_blog = of_get_option( 'desc_blog' );
		?>

		<?php if(!empty($icon_blog)) : ?>
			<div title="<?php echo $desc_blog; ?>" class="icon" style="background-image: url(<?php echo $icon_blog; ?>)">
				<a class="link" href="<?php echo $link_blog; ?>"></a>
			</div>
		<?php endif; ?>

		<?php
			$icon_contato = of_get_option( 'icone_contato' );
			$link_contato = of_get_option( 'link_contato' );
			$desc_contato = of_get_option( 'desc_contato' );
		?>

		<?php if(!empty($icon_contato)) : ?>
			<div title="<?php echo $desc_contato; ?>" class="icon" style="background-image: url(<?php echo $icon_contato; ?>)">
				<a class="link" href="<?php echo $link_contato; ?>"></a>
			</div>
		<?php endif; ?>

	</div><!-- conteudo -->
</div>
<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.','other'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
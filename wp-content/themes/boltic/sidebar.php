<div class="sidebar box">
	<?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>
		
		<?php dynamic_sidebar( 'sidebar-main' ); ?>

	<?php else : ?>

		<!-- This content shows up if there are no widgets defined in the backend. -->
		
		<div class="alert info">
			<p>Aktivera några widgets</p>
		</div>

	<?php endif; ?>
</div>
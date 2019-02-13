<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" class="searchform" >
	<div>
		<label class="screen-reader-text" for="s"><?php esc_html_e( 'Search for:', 'seil' ); ?></label>
		<input type="text" name="s" id="s" placeholder="<?php esc_html_e('Search...','seil'); ?>" />
		<input type="submit" id="searchsubmit" value="Submit" />
	</div>
</form>
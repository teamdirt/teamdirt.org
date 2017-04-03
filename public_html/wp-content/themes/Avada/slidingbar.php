<?php global $smof_data; ?>
<?php if($smof_data['slidingbar_open_on_load']): ?>
<div id="slidingbar-area" class="open_onload">
<?php else: ?>
<div id="slidingbar-area">
<?php endif; ?>
	<div id="slidingbar">
		<div class="avada-row">
			<div class="fusion-columns row fusion-columns-<?php echo $smof_data['slidingbar_widgets_columns']; ?> columns columns-<?php echo $smof_data['slidingbar_widgets_columns']; ?>">
				<?php 
				$column_width = 12 / $smof_data['slidingbar_widgets_columns']; 
				if( $smof_data['slidingbar_widgets_columns'] == '5' ) {
					$column_width = 2;
				}				
				?>
			
				<?php if( $smof_data['slidingbar_widgets_columns'] >= 1 ): ?>
				<div class="fusion-column col <?php echo sprintf( 'col-lg-%s col-md-%s col-sm-%s', $column_width, $column_width, $column_width ); ?> ">
				<?php
				if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('SlidingBar Widget  1')):
				endif;
				?>
				</div>
				<?php endif; ?>
				
				<?php if( $smof_data['slidingbar_widgets_columns'] >= 2 ): ?>
				<div class="fusion-column col <?php echo sprintf( 'col-lg-%s col-md-%s col-sm-%s', $column_width, $column_width, $column_width ); ?>">
				<?php
				if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('SlidingBar Widget  2')):
				endif;
				?>
				</div>
				<?php endif; ?>
				
				<?php if( $smof_data['slidingbar_widgets_columns'] >= 3 ): ?>
				<div class="fusion-column col <?php echo sprintf( 'col-lg-%s col-md-%s col-sm-%s', $column_width, $column_width, $column_width ); ?>">
				<?php
				if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('SlidingBar Widget  3')):
				endif;
				?>
				</div>
				<?php endif; ?>
				
				<?php if( $smof_data['slidingbar_widgets_columns'] >= 4 ): ?>
				<div class="fusion-column col last <?php echo sprintf( 'col-lg-%s col-md-%s col-sm-%s', $column_width, $column_width, $column_width ); ?>">
				<?php
				if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('SlidingBar Widget  4')):
				endif;
				?>
				</div>
				<?php endif; ?>

				<?php if( $smof_data['slidingbar_widgets_columns'] >= 5 ): ?>
				<div class="fusion-column col last <?php echo sprintf( 'col-lg-%s col-md-%s col-sm-%s', $column_width, $column_width, $column_width ); ?>">
				<?php
				if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('SlidingBar Widget  5')):
				endif;
				?>
				</div>
				<?php endif; ?>

				<?php if( $smof_data['slidingbar_widgets_columns'] >= 6 ): ?>
				<div class="fusion-column col last <?php echo sprintf( 'col-lg-%s col-md-%s col-sm-%s', $column_width, $column_width, $column_width ); ?>">
				<?php
				if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('SlidingBar Widget  6')):
				endif;
				?>
				</div>
				<?php endif; ?>
				<div class="fusion-clearfix"></div>
			</div>			
		</div>
	</div>
	<div class="sb-toggle-wrapper"><a class="sb-toggle" href="#"></a></div>
</div>
<?php wp_reset_postdata(); ?>
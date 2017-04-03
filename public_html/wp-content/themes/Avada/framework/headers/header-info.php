<?php global $smof_data; ?>
<?php if($smof_data['header_number'] || $smof_data['header_email']): ?>
<div class="header-info"><?php echo $smof_data['header_number']; ?><?php if($smof_data['header_number'] && $smof_data['header_email']): ?><?php if($smof_data['header_position'] == 'Top'): ?><span class="sep">|</span><?php else: ?><br /><?php endif; ?><?php endif; ?><a href="mailto:<?php echo $smof_data['header_email']; ?>"><?php echo $smof_data['header_email']; ?></a></div>
<?php endif; ?>

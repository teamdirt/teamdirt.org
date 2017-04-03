jQuery(document).ready(function($) {

	tinymce.create('tinymce.plugins.layerslider_plugin', {

		init : function(ed, url) {

			var self = this;

			// Select slider
			$(document).on('click', '.ls-pointer li', function() {
				self.selectSlider(this);
				self.closePopup();
			});

			// Close event
			$(document).on('click', '.ls-overlay', function() {
				self.closePopup();
			});

			// Button props
			ed.addButton('layerslider_button', {
				title : 'Add LayerSlider',
				cmd : 'layerslider_insert_shortcode',
				onClick : function() { self.openPopup(); }
			});
		},


		openPopup : function() {

			// Check if popup is already opened
			if($('.ls-pointer').length) {
				return;
			}

			// Add popup markup
			$('body').prepend( $('<div>', { 'class' : 'ls-pointer ls-shortcode-pointer ls-box' })
				.append( $('<span>', { 'class' : 'ls-mce-arrow'} ))
				.append( $('<h3>', { 'class' : 'header', 'text' : 'Insert LayerSlider to page'} ))
				.append( $('<ul>', { 'class' : 'inner' } ))
			);

			// Get popup
			var popup = $('.ls-pointer');

			// Get sliders
			$.getJSON(ajaxurl, { action : 'ls_get_mce_sliders' }, function(data) {
				for(c = 0; c < data.length; c++) {
					popup.children('ul').append( $('<li>', { 'data-id' : data[c]['id'], 'data-slug' : data[c]['slug'] })
						.append( $('<div>', { 'class' : 'preview' })
							.append( $('<img>', { 'src' : data[c]['preview']}))
						)
						.append( $('<div>', { 'class' : 'title', 'text' : data[c]['name'].substr(0, 28) }))
					);
				}
			});

			// Get button props
			var offsets = $('.mce-i-layerslider_button,.mce_layerslider_button').offset();

			// Show popup
			$('.ls-pointer').css({
				top : offsets.top + 35,
				left : offsets.left + 12 - popup.outerWidth() / 2
			}).animate({ marginTop : 0, opacity : 1 }, 150);

			// Add overlay
			$('<div>', { 'class' : 'ls-overlay'}).prependTo('body');
		},

		searchSlider : function() {

		},

		selectSlider : function(el) {
			if($(el).data('slug') != '') {
				tinymce.execCommand('mceInsertContent', false, '[layerslider id="'+$(el).data('slug')+'"]');
			} else {
				tinymce.execCommand('mceInsertContent', false, '[layerslider id="'+$(el).data('id')+'"]');
			}
		},

		closePopup : function() {
			if($('.ls-pointer').length) {
				$('.ls-overlay').remove();
				$('.ls-pointer').animate({ marginTop : 40, opacity : 0 }, 150, function() {
					$(this).remove();
				});
			}
		}
	});

	// Add button
	tinymce.PluginManager.add('layerslider_button', tinymce.plugins.layerslider_plugin);
});

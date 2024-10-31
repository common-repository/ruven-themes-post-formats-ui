===Ruven Themes: Post Formats UI===

Contributors: Ruven
Tags: post formats ui, post formats
License: GPLv2 or later
Requires at least: 3.5.0
Tested up to: 4.0
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

RT Post Formats UI provides a UI for post formats.


==Description==

This plugin provides a UI for the post formats Link, Quote, Video, and Audio.

Selected themes by Ruven will display the data that you provide through the UI.
In other themes you will have to edit the templates in your theme in order to output the data.

**Link Settings**

* Link URL: `<?php echo esc_url(get_post_meta($post_id, '_rtpfui_link_url', true)); ?>`

**Quote Settings**

* Quote: `<?php echo esc_attr(get_post_meta($post_id, '_rtpfui_quote', true)); ?>`
* Source Name: `<?php echo esc_attr(get_post_meta($post_id, '_rtpfui_quote_source_name', true)); ?>`
* Link URL: `<?php echo esc_url(get_post_meta($post_id, '_rtpfui_quote_link_url', true)); ?>`

**Video Settings**

* Embed Code or oEmbed URL: `<?php echo get_post_meta($post_id, '_rtpfui_video_oembed', true); ?>`
* Self Hosted MP4 File: `<?php echo esc_url(get_post_meta($post_id, '_rtpfui_video_mp4_file', true)); ?>`
* Self Hosted OGV File: `<?php echo esc_url(get_post_meta($post_id, '_rtpfui_video_ogv_file', true)); ?>`

**Audio Settings**

* Embed Code or oEmbed URL: `<?php echo get_post_meta($post_id, '_rtpfui_audio_oembed', true); ?>`
* Self Hosted MP3 File: `<?php echo esc_url(get_post_meta($post_id, '_rtpfui_audio_mp3_file', true)); ?>`
* Self Hosted OGG File: `<?php echo esc_url(get_post_meta($post_id, '_rtpfui_audio_ogg_file', true)); ?>`


==Changelog==

= v1.0 =
* Initial Release.


==Installation==

This plugin can be installed directly from your site.

1. Log in and navigate to Plugins &rarr; Add New.
2. Type "Ruven Themes: Post Formats UI" into the Search input and click the "Search Plugins" button.
3. Locate the Ruven Themes: Post Formats UI in the list of search results and click "Install Now".
4. Click the "Activate Plugin" link at the bottom of the install screen.


It can also be installed manually.

1. Download the "Ruven Themes: Post Formats UI" plugin from WordPress.org.
2. Unzip the package and move it into your plugins directory.
3. Log into WordPress and navigate to the "Plugins" screen.
4. Locate "Ruven Themes: Post Formats UI" in the list and click the "Activate" link.


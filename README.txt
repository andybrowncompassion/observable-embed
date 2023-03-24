=== Plugin Name ===
Contributors: andybr0wn
Donate link: http://example.com/
Tags: Observable, dataviz, shortcode
Requires at least: 
Tested up to: 6.1.1
Stable tag: 
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A shortcode for embedding Observable notebooks

== Description ==

Usage
    [observable-embed notebook='url to notebook.js' cell='optional cell name']

_note: this shortcode may be used multiple times on a page/post. Specified cells share a common runtime/library so they can interact. Also implemented responsive width functionality so cells respond to resizing of their containers. Skip the cell attribute to display the entire notebook (named cells only)_

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `observable-embed.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php do_action('observable_embed_hook'); ?>` in your templates

== Frequently Asked Questions ==

= A question that someone might have =

An answer to that question.

= What about foo bar? =

Answer to foo bar dilemma.

== Screenshots ==



== Changelog ==

= 1.0 =
* Initial release

= 0.5 =
* List versions from most recent at top to oldest at bottom.

== Upgrade Notice ==

= 1.0 =
Upgrade notices describe the reason a user should upgrade.  No more than 300 characters.

= 0.5 =
This version fixes a security related bug.  Upgrade immediately.

== Arbitrary section ==

You may provide arbitrary sections, in the same format as the ones above.  This may be of use for extremely complicated
plugins where more information needs to be conveyed that doesn't fit into the categories of "description" or
"installation."  Arbitrary sections will be shown below the built-in sections outlined above.

== A brief Markdown Example ==

Ordered list:

1. Some feature
1. Another feature
1. Something else about the plugin

Unordered list:

* something
* something else
* third thing

Here's a link to [WordPress](http://wordpress.org/ "Your favorite software") and one to [Markdown's Syntax Documentation][markdown syntax].
Titles are optional, naturally.

[markdown syntax]: http://daringfireball.net/projects/markdown/syntax
            "Markdown is what the parser uses to process much of the readme file"

Markdown uses email style notation for blockquotes and I've been told:
> Asterisks for *emphasis*. Double it up  for **strong**.

`<?php code(); // goes in backticks ?>`
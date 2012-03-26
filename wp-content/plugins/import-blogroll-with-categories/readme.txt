=== Import Blogroll With Categories ===
Contributors: TheDoubtfulRebel
Donate link: http://www.unisyndesign.com/
Tags: blogroll, links, bookmarks, categories, link categories, import, opml, insert, categorized blogroll
Requires at least: 2.7
Tested up to: 2.7.1
Stable tag: 1.0

Import links/blogroll in OPML format and allow them to be inserted into their proper link categories. 

== Description ==

If you have ever been annoyed by the default blogroll (links, bookmarks) import functionality of WordPress forcing you 
to select **one** category to insert **all** links into, this plugin is for you.

If you have an OPML feed that is categorized (like the standard WordPress OPML links export), you naturally want to 
import the links into their proper categories. 

Here is what this plugin does:

* Adds a new importer ('Blogroll With Categories') to the Tools->Import page
* Adds a link directly to this improved importer in the Links sub-menu
* Adds a link to the blogroll export file (that is otherwise not referred to at all!) in the Links sub-menu

If you fancy not adding those extra links to the Links sub-menu, I made it easy to disable this functionality in the top 
of the main plugin file. Personally, I like having all my Links tools in the same menu.

When you want to import an OPML file or URL, you can specify one of two options:

1. Allow the plugin to create new **link categories** for any categories not found within your blog already.
1. Specify a default category the links will go into if their categories are not found within your blog already.

If your blog already contains all the necessary **link categories**, then the functionality is the same - each link gets 
inserted into its proper category.

== Installation ==

1. Upload the directory `/import-blogroll-with-categories/` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. To use it: `Links->Import` **or** `Tools->Import->Blogroll With Categories`

== Frequently Asked Questions ==

= What about sub-categories? =

WordPress doesn't even support sub-categories for *link categories*. If you try to upload an OPML file that is 
sub-categorized, you can probably expect strange behavior. However, depending on the structure of the file, you may 
still be pleased with the result.

= Which systems that generate OPML files have you tested? =

So far, I have tested WordPress generated OPML files, and Firefox (with the OPML Support add-on) generated OPML files. 
If anyone has trouble with an OPML file from a different program, let me know all about it and I'll see if it is an easy fix.

= Is the category check case-sensitive? =

No. the category check is case-insensitive. Therefore, you could have a link category named 'Cars' in your blog and a category 
named 'CARS' in the OPML file, and those links would be properly inserted into 'Cars'.

= Does this plugin work with WordPress versions less than 2.7? =

No. At least not yet. I built it on 2.7 and poked around trying to get it work on 2.6 but did not succeed. If people 
actually download this plugin, maybe I'll work on some backwards compatibility.

= Can this be a mu-plugin in WordPress MU? =

Yes, you'll can put the main plugin file `import-blogroll-with-categories.php` in the `mu-plugins` directory to enable it 
automatically for all blogs. You'll just have to put the file `bwc_opml.php` in a sub-directory and change the path of the 
include in the `set_bwc_opml()` function.

== Screenshots ==

1. The improved links importer accessible though Links->Import or, Tools->Import->Blogroll With Categories

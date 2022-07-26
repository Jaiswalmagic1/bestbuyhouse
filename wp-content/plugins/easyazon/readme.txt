=== EasyAzon - Amazon Associates Affiliate Plugin ===
Contributors: flowdee
Donate link: https://donate.flowdee.de
Tags: amazon, amazon affiliate, amazon associate
Requires at least: 3.8
Requires PHP: 5.6.0
Tested up to: 5.9.0
Stable tag: 5.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

EasyAzon is the quickest way to create Amazon affiliate links from within WordPress.

== Description ==

**EasyAzon** is the quickest way to create Amazon affiliate links from within your WordPress post editor. You can create text affiliate links direct to any product available for sale on Amazon.com without going through the tedious steps of manually creating links from within the Amazon.com website _(huge time saver)_.

= 📌 EasyAzon Features =

EasyAzon set up is simple and we support every location that has an Amazon Associates affiliate program including:

* United States
* Canada
* China
* France
* Germany
* India
* Italy
* Japan
* Spain
* United Kingdom

You can create text affiliate links that can be optionally toggled to open in new windows and/or have the nofollow attribute applied. This can be controlled site wide through the plugin setting page defaults or individually controlled on a per link basis.

When you install EasyAzon, you will also get access to our Amazon Affiliate Training, which includes:

* What goes into a succesful Amazon Affiliate Site
* Tips to maximize your Amazon commissions
* Backlinking techniques that work in 2015
* How to do keyword research
* And much more...

EasyAzon provides additional support for more affiliate link types and affiliate link options all designed to help you save time and generate more affiliate commissions.

= 📌 EasyAzon Additional Affiliate Link Types =

In addition to text affiliate links you can also create:

**Image affiliate links** — insert an image of a product from Amazon and turn that image into a clickable affiliate link

**Product information blocks** — displays product title, image thumbnail, price info and a buy button in a styled block

**Call to actions** — insert Amazon.com buy buttons

= 📌 EasyAzon Additional Affiliate Link Options =

In addition to toggling links to open in new windows or applying the nofollow attribute you can also enable:

**Automated affiliate link cloaking**

**Product pop ups** — display product info via a pop up box on mouse hover

**Add to cart functionality** — increases the cookie length which gives you more time to earn a commission if the visitor adds the item to their shopping cart

**Automatic link localization** — earn commissions from previously wasted global traffic by automatically converting affiliate links to match the location your website is being visited from: e.g. UK visitors see Amazon.co.uk links

**Support for multiple affiliate tracking ID's** — track which links convert best

= 🚨 Want more Features? 🚨 =

Want more features for your affiliate website? How does the following sound to you:

⭐ Well-Designed Product Boxes
⭐ Automated Bestseller Lists
⭐ Comparison Tables
⭐ Conversion Optimized Templates
⭐ Bypassing Ad Blockers
⭐ Sorting & Filtering of Products

You like it? Then you definitely need to check out our upgrade and take your affiliate website to the next level!

👉 [CLICK HERE TO LEARN MORE](https://getaawp.com?utm_source=WordPress.org&utm_medium=wp-org-description&utm_campaign=EasyAzon+Upgrade&utm_term=upgrade-link) 👈

== Installation ==

EasyAzon is easy to install and configure.

1. Upload the `easyazon` directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Visit the EasyAzon settings page and enter your Amazon security credentials

That's it! A new button will be added above the WordPress editor that lets your search for and link to Amazon
products.

== Frequently Asked Questions ==

= How do I find my Amazon credentials? =

There is a link on the EasyAzon settings page that will direct you to the appropriate page on Amazon. Simply copy your
credentials from there and enter them into the correct fields on the EasyAzon settings page.

= Is EasyAzon truly free? =

Yes! EasyAzon is free software provided to anyone looking to build text links on their site.

= Where can I get video demos of EasyAzon?

[Click here to see help videos / tutorials](https://easyazon.com/how-to)

== Screenshots ==

1. EasyAzon features an easy to use settings interface. The only required fields are your Amazon Access Key ID and Secret Access Key.
2. EasyAzon's search interface is easy to use - enter your search terms, select your desired locale, and off you go!
3. EasyAzon will show you a list of products matching your search terms from your desired locale - find the product you want and click _Text Link_
4. Specify link text, select your Amazon Associates Tracking ID, and change the desired link options. After that, click _Insert Shortcode_

== Changelog ==

= Version 5.1.0 (16th February 2022) =
* Tweak: Optimized settings page widgets
* Tweak: Removed deprecated admin notices and infos
* WordPress v5.9 compatibility

= Version 5.0.1 (26th August 2021) =
* Fix: Fatal error when updating or activating free version plugin.
* PHP v7.4.1 compatibility
* WordPress v5.7.2 compatibility

= Version 5.0.0 (15th July 2021) =
* New: Additional default link settings in EasyAzon menu under Defaults tab
* New: EasyAzon Free course message
* New: Localized Products - Localize product from other country will work in reverse
* New: Additional search options when search keywords or ASIN in EasyAzon popup box
* New: Additional affiliate link types to insert in any custom post types content editor such as Image Link, CTA Link and Info Block
* New: Allow the user to change default affiliate types 
* Tweak: Plugin can now be translated via WordPress.org contributors
* PHP v7.4.1 compatibility
* WordPress v5.7.2 compatibility

= Version 4.1.2 (16th June 2021) =
* Tweak: Plugin can now be translated via WordPress.org contributors
* Tweak: Added support for stores X, Y, Z
* PHP v7.4.1 compatibility
* WordPress v5.7.2 compatibility

= Version 4.1.0 (21th May 2021) =
* Info: A new development team has taken over and is looking forward to the future of this plugin with you guys!
* PHP v7.4.1 compatibility
* WordPress v5.7.2 compatibility

= 4.0.32 =
* Fixed another bug that occurred when Amazon was not returning a set of errors

= 4.0.30 =
* Fixed bug whereby Amazon was not returning an error object appropriately

= 4.0.29 =
* Show actual error messages from Amazon when there are problems
* Refinement to help text

= 4.0.28 =
* Validate credentials for each locale with an associate tag set configured
* Only show search locales in main search interface with configured associate tags

= 4.0.27 =
* Fixed bug with locale argument being in wrong place from `easyazon_get_item`

= 4.0.26 =
* Fixed warning generated for non-existent variable
* Massage attributes from new response into array for backward compatibility

= 4.0.25 =
* Fixed warning generated for when there are no image variants
* Fixed warning when using an array not by reference

= 4.0.24 =
* Changed to use Version 5 of the Product Advertising API
* Various small bug fixes

= 4.0.22 =
* Various small bug fixes
* Bumped 'Tested Up To' version

= 4.0.21 =
* Added placeholder meta box in preparation for Gutenberg launch

= 4.0.20 =
* Bumped tested up to version
* Added the Australian locale for requests

= 4.0.19 =
* Bumped compatible up to version

= 4.0.18 =
* Changed priority of media_buttons hook to 999999 for compatibility with Beaver Builder
* Bumped compatible up to version

= 4.0.17 =
* Fixed issue with settings page tabs from upgrade to WP 4.4

= 4.0.16 =
* Bumped compatible up to version

= 4.0.15 =
* Fixed bug with fetching current price

= 4.0.14 =
* Provide better data from the EasyAzon API interaction library
* Expanded compatibility with Pro
* Minor bugfixes
* Removed some extraneous code for integration with legacy systems

= 4.0.11 =
* No longer disable EasyAzon Pro less than Version 4
* Provide instructions on where to get EasyAzon Version 3

= 4.0.9 =
* Detect PHP version and detect whether the minimum required version is met
* Fixed bug whereby disabling the rich editor caused the EasyAzon pop up to not appear

= 4.0.6 =
* Removed duplicate images from normalized item results

= 4.0.5 =
* Fixed upsell links for upgrading to EasyAzon Pro
* Deactivate non-compatible EasyAzon Pro versions as appropriate

= 4.0.0 =
* Completely rewritten to be faster and more performant

= 3.0.6 =
* Added nofollow ability for links

= 3.0.5 =
* Initial release to general public

== Upgrade Notice ==

= 3.0.5 =
The new EasyAzon was completely rebuilt from the ground up to be provide a better user experience and integrate into the
WordPress UI in a more standardized manner.

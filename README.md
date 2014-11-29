# Org: WPezPlugins
### Product: WPezClasses_Autoload (plugin)

##### Simple "wrapper" plugin to autoload the WPezClasses framework. 

WPezClasses (https://github.com/WPezClasses/) is growing collection of classes architected and engineered to improve the efficiency and awesomeness of WordPress theme and plugin developers.


============================================================

####Overview 

- See below.


####Dependencies

- https://github.com/WPezClasses/wp-ezclasses-master-singleton


IMPORTANT - Using WPezClasses Autoload
=======================================

You are certainly welcome to use individual WPezClasses on an as needed basis. The framework is intentionally uber-granular and developer-centric.

However, one of the founding ideals of WPezClasses is to reduce redundant code, as well as extend the native WordPress framework. That is, to "re-distill" (so to speak) native WP and make it quick and easier to work with. If it helps, try to imagine WPezClasses as the WordPress 6.5 you've been dreaming about.

It's important to note that WPezClasses is *not* targeted to developers looking to market free-standing products in (for example) the WordPress.org theme and/or plugin "stores". If you're going to use WPezClasses for that end then please be sure to make all the necessary adjustment (e.g., rename the WPezClasses files and classes within your product(s)). 

On the other hand, if you're doing custom work for unique WordPress based applications then WPezClasses is for you. By unique we mean for a client or group of clients. You're not necessarily trying to develop traditional free-standing WP plugins and WP themes for the masses. Frankly, mass appeal is not a WPezClasses aspiration.

For example, we all agree the same (or very similar) code should not be in multiple plugins in the same install. Clearly, that is a coding and maintenance nightmare. Instead, a single copy of the code (i.e., class) would reside in the WPezClasses library. It's there, always, ready & waiting - just like the traditional WP core / frameform.



The Ideal Implementation of the WPezClasses Framework
======================================================

The ideal implementation of the WPezClasses framework uses the WPezClasses Autoload plugin. 

The WPezClasses Autoload plugin should be installed in the Must Use Plugins (http://codex.wordpress.org/Must_Use_Plugins) folder (mu-plugins).

It is also strongly recommended that you consider using the plugin WPezMU-Plugins (https://github.com/WPezPlugins/wp-ezmu-plugins). WPezMU-Plugins will enable you to manage and fine-tune the load order and activation of your Must Use Plugins.

It is also recommended you have your own version of WPezClasses Master Singleton (https://github.com/WPezClasses/wp-ezclasses-master-singleton). Nearly all of the classes in WPezClasses extends this class. There is a copy of WPezClasses Master Singleton within WPezClasses Autoload. However, that only loads if you don't have your own copy pre-included. In order to maintain maximum autotony, have your own copy. It's the WPezClasses way.

In short, use WPezMU-Plugins to load WPezClasses Master Singleton and then WPezClasses Autoload. As a matter of fact, when you clone / download WPezMU-Plugins you'll see that these are actually the "dummy" example. 



And Finally...
==============

Also in your mu-plugins folder you will need a folder wp-ezclasses. This folder should be further divided by areas of interest. The first segment after 'class-wp-ezclasses' is the name of the sub-folder. In these sub-folders will be the individual WPezClasses products that you're leaning on. 

For example, if we had class-wp-ezclasses-foo-1-bar-2.php, 'foo' would be the sub-folder. All classes that involve 'foo' would end up somewhere under 'foo'.

That is the path would look like this:

mu-plugins / wp-ezclasses / foo / class-wp-ezclasses-foo-1-bar-2 / class-wp-ezclasses-foo-1-bar-2.php

Technically, the WPezClasses Autoload logic parses the name of the requested class and then rearranges that a bit to build the path to do the require_once().

Yes, some might say the naming convention is somewhat heavy handed and the structure very particular, but that seemed better than too vague and sprawling. 


Note: Establishing and maintaining this structure also allows the individual classes to be addressed and maintained as unqiue and freestanding products, focused and finely tuned, as good classes / products should be. It also *not* forces you to buy into the entire WPezClasses ecosystem. WPezClasses empowers you to be selective about what you lean on. 



p.s. The folder: wp-myclasses
=============================

Once you get comfortble with WPezClasses we hope you'll be inspired to think about WP dev the WPezClasses way. That is, you'll become a WPezDeveloper. 

All you'll have to do is follow the WPezClasses naming convention and the WPezClasses Autoload plugin can be used to load your classes as well.
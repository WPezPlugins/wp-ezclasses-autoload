WP ezClasses Autoload
=====================

"Wrapper" plugin to autoload the WP ezClasses framework. WP ezClasses (https://github.com/WPezClasses/) is growing collection of classes (and methods) architected and engineered to fulfill the needs of WordPress theme and plugin developers.



IMPORTANT - Using WP ezClasses Autoload
=======================================

You are certainly welcome to use individual WP ezClasses on an as needed basis. It is intentionally uber-granular and developer-friendly.

However, one of the founding ideals of the WP ezClasses framework is to reduce redundant code, as well as extend the native WordPress framework. That is, to "facade" (so to speak) native WP and make it quick and easier to work with. If it helps, try to imagine WP ezClasses as the WordPress 6.5 you've been dreaming out.

It's important to note that WP ezClasses is *not* targeted to developers looking to market free-standing products in (for example) the WordPress.org theme and/or plugin "stores". If you're going to use WP ezClasses for that end then please be sure to make all the necessary adjustment (e.g., rename the WP ezClasses files and classes within your product(s)). 

On the other hand, if you're doing custom work for unique WordPress based applications then WP ezClasses is for you. By unique we mean for a client or group of clients. You're not necessarily trying to develop traditional free-standing WP plugins and WP themes for the masses. 

For example, we all agree the same class (i.e., same code, different name, obvious) should not be in multiple plugins in the same install. Clearly, that is a coding and maintenance nightmare. Instead, a single copy of the class would reside in your WP ezClasses library. It's there, always, ready & waiting - just like the traditional WP frameform.



The Ideal Implementation of the WP ezClasses Framework
======================================================

The ideal implementation of the WP ezClasses framework uses the WP ezClasses Autoload plugin. 

The WP ezClasses Autoload plugin should be installed in the Must Use Plugins folder (mu-plugins).

It is also recommended that you strongly consider using the plugin WP ezMU-Plugins (https://github.com/WPezPlugins/wp-ezmu-plugins). WP ezMU-Plugins will help you to manage and fine-tune the load order and activation of your Must Use Plugins.

It is also recommended you have your own version of WP ezClasses Master Singleton (https://github.com/WPezClasses/wp-ezclasses-master-singleton). All of the classes in WP ezClasses extends this class. There is a copy of WP ezClasses Master Singleton within WP ezClasses Autoload. However that only loads if you don't have your own copy pre-included. In order to maintain autotony, have your own copy. It just make more sense that way.

In short, use WP ezMU-Plugins to load WP ezClasses Master Singleton and then WP ezClasses Autoload. As a matter of fact, when you clone / download WP ezMU-Plugins you'll see that these are actually the "dummy" example. 



And Finally...
==============

Also in your mu-plugins folder you will need a folder wp-ezclasses. In that will be the individual WP ezClasses that you're leaning on. There will also be a set of subfolders within the wp-exclasses folder. That will be explained in the README each WP ezClasseses product. Yes, there is a method to the madness of the WP ezClasses naming convention. 

Note: Establishing and maintaining this structure also allows the individual classes to be addressed and maintained as unqiue and freestanding products, focused and finely tuned, as good classes / products should be. It also *not* forces you to buy into the entire WP ezClasses ecosystem. WP ezClasses empowers you to be selective about what you lean on. 



p.s. The folder: wp-myclasses
==========================

Once you get comfortble with WP ezClasses we hope you'll be inspired to think about WP dev the WP ezClasses way. That is, you'll become a WP ezDeveloper. 

All you'll have to do is follow the WP ezClasses naming convention and the WP ezClasses Autoload plugin can be used to load your classes as well.
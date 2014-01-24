WP ezClasses Autoload
=====================

"Wrapper" plugin to autoload the WP ezClasses framework. WP ezClasses (https://github.com/wpezclasses/) is growing collection of classes (and methods) architected and engineered to fulfill the needs of WordPress theme and plugin developers.



IMPORTANT - Using WP ezClasses Autoload
=======================================

You are certainly welcome to use individual WP ezClasses on an as needed basis. It is intentionally uber-granular.

However, one of the founding ideals of the WP ezClasses framework is to reduce redundant code, as well as extend the native WordPress framework. That is, to "facade" (so to speak) native WP and make it quick and easier to work with. If it helps, try to imagine WP ezClasses as WordPress 6.5.

It's important to note that WP ezClasses is *not* targeted to developers looking to market free-standing products in (for example) the WordPress.org theme and/or plugin "stores". If you're going to use WP ezClasses for that then please be sure to rename the WP ezClasses files and classes within your product(s). 

On the other hand, if you're doing custom work for unique WordPress based applications then WP ezClasses is for you. By unique we mean for a client or group of clients. You're not necessarily trying to develop traditional free-standing WP plugins and WP themes for the masses. 

For example, we all agree the same class should not be to in multiple plugins in the same install. Clearly, that is a coding and maintenance nightmare. Instead, a single copy of the class would reside in your WP ezClasses Autoload library. It's there, waiting. Just like the traditional WP frameform.



The Ideal Implementation of the WP ezClasses Framework
======================================================

The ideal implementation of the WP ezClasses framework uses the WP ezClasses Autoload plugin. 

The the WP ezClasses Autoload plugin should be installed in the Must Use Plugins folder (mu-plugins).

It is also recommended that you strongly consider using the plugin WP ezMU-Plugins (https://github.com/WPezPlugins/wp-ezmu-plugins). WP ezMU-Plugins will help you to manage and fine-tune the load order and activation of your Must Use Plugins.

It is also recommended you have your own version of WP ezClasses Master Singleton (https://github.com/WPezClasses/wp-ezclasses-master-singleton). All of the classes in WP ezClasses extends this class. There is a copy of WP ezClasses Master Singleton within WP ezClasses Autoload. However that only loads if you don't have your own copy pre-included. In order to maintain autotony, have your own copy. It just make more sense that way.

In short, use WP ezMU-Plugins to load WP ezClasses Master Singleton and then WP ezClasses Autoload. As a matter of fact, when you clone / download WP ezMU-Plugins you'll see that these are actually the example. 



And Finally...
==============

As you add (within WP ezClasses Autoload) classes to your personalized version of the WP ezClasses framework, those folders could / should be Git submodules. 

http://www.git-scm.com/book/en/Git-Tools-Submodules

If you're not familiar with submodules, imagine submodules as repos within repos. In this case, WP ezClasses Autoload is the outer "wrapper" repo and the individual WP ezClasses will be submodules within it.

Yes, a bit granular. But that's the point. We want to keep things silo'ed and well organized. We don't want to force anyone to do or use anything they don't want to. In other words, we didn't want to force the whole of the WP ezClasses framework on people. That would be silly, as well as poor architecture.

Note: This also allows the individual classes to be addressed asunqiue and freestanding products, focused and finely tuned, as good classes / products should be. 

There are particulars to submodule'ing WP exClasses into WP ezClasses Autoload. Those details / instructions will be with each class. 


p.s. The folder: myclasses
==========================

Once you get comfortble with WP ezClasses we hope you'll be inspired to think about WP dev the WP ezClasses way. That is, you'll become a WP ezDeveloper. 

All you'll have to do is follow the WP ezClasses naming convention and the WP ezClasses Autoload plugin will load your classes as well.
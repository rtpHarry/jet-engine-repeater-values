# Introduction
This is a plugin which extends the Crocoblock Jet Engine plugin for Elementor.

It integrates the Jet Engine repeater fields into the Dynamic Tags 
functionality of Elementor.

It provides options for integrating all dynamic tag field types directly, 
instead of using the dynamic widgets.

The Dynamic Visibility functionality supports dynamic tags, so this plugin
also adds support for controlling visibility based on a repeater value.

# Usage
Install the plugin and then you will find a new option in the list of dynamic 
tags list, under the runthings.dev group.

You must be in a listing template, accessed via:

    Admin panel > Jet Engine > Listings > Select a template > Edit With Elementor

Then click the dynamic tag on any field and scroll down to:

    runthings.dev > JetEngine Repeater Field

Once selected, click the wrench icon to the left of the field, and enter the
name of the repeater field you want to bind.

You can get the name of the repeater field by going to the place you defined 
it, eg:

    Admin panel > Jet Engine > Post Types > Edit > Repeater Field

The name is defined next to the label in the list of fields.

# Changelog
1.1.1 - 19th December 2021
  - Bugfix - Tweak dynamic tag names so they don't clash when a field supports
    all category types

1.1.0 - 19th December 2021
  - Added licence
  - Added readme
  - Added support for url fields
  - Added support for post meta fields
  - Added support for number fields
  - Added support for color fields
  - Added support for gallery fields
  - Added support for image fields
  - Added support for media fields

1.0.0 - 13th December 2021
  - Initial release
  - Supports text fields

# Licence
This plugin is licenced under GPL 3, and is free to use on personal and 
commercial projects.

# Author
Built by Matthew Harris of runthings.dev, copyright 2021.

https://runthings.dev/

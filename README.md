# ArtDroid
### WordPress for Artists (and Photographers)
- Brought to you by Phong & Android Jones
- Built with [Postworld](https://github.com/ansonphong/postworld), WordPress theme dev tools
- Uses Angular.js V1 as a client side framework
- Examples:
  - [Android Jones](https://androidjones.com)
  - [Xavi](https://xaviart.com)
  - [Chris Dyer](https://positivecreations.ca)
  - [Phong](https://phong.com)

### Getting Started
- Just clone this into `/wp-content/themes/artdroid` and you're good to go.
- Visit the [Artdroid Support Website](https://artdroid.phong.com/) for the Getting Started guide, which gives a general overview of how to get booted up with the theme.

### Common gotchas
- After cloning, make sure to also go into `/artdroid` and run this command to download all the required submodules `git submodule update --init --recursive`
- Make sure permissions on `/wp-content/uploads` is `777`
- Make sure permissions on `/wp-content/themes/artdroid/postworld/deploy` are `777`

### CHMOD Commands

Go into the root directory of your WordPress install and run this to set all the permissions.

```
chmod 777 -R wp-content/uploads; chmod 777 -R wp-content/themes/artdroid/postworld/deploy; chmod 777 -R wp-content/themes/artdroid/postworld/log;
```


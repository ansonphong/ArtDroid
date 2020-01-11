# ArtDroid
### WordPress for Artists (and Photographers)
- This is a WordPress theme
- Brought to you by Phong & Android Jones
- Built with [Postworld](https://github.com/ansonphong/postworld), WordPress theme dev tools
- Uses Angular.js V1 as a client side framework
- This is a loosely maintained project, still in steady use
- Examples:
  - [Android Jones](https://androidjones.com)
  - [Xavi](https://xaviart.com)
  - [Chris Dyer](https://positivecreations.ca)
  - [Phong](https://phong.com)

### Getting Started
- Just clone this into `/wp-content/themes/artdroid` and you're good to go.
- [Getting Started with Artdroid](https://artdroid.phong.com/getting-started/) is the official guide, which gives a general overview of how to get booted up with the theme. [artdroid.phong.com](https://artdroid.phong.com/)

### Common gotchas
- After cloning, make sure to also go into `/artdroid` and run this command to download all the required submodules `git submodule update --init --recursive`
- Make sure permissions on `/wp-content/uploads` is `777`
- Make sure permissions on `/wp-content/themes/artdroid/postworld/deploy` are `777`

### CHMOD Commands

Go into the root directory of your WordPress install and run this to set all the permissions.

```
chmod 777 -R wp-content/uploads; chmod 777 -R wp-content/themes/artdroid/postworld/deploy; chmod 777 -R wp-content/themes/artdroid/postworld/log;
```


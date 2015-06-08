# ArtDroid // Changelog

### Version 1.12
- **Breaking Changes** - Changed Template Names
    + Header and footer templte names have been changed from 'artdroid-header' and 'artdroid-footer' to 'theme-header' and 'theme-footer' respectively.
    + All installations will require re-setting the layout options for the header/footer

### Version 1.0.8
- **Breaking Changes** - Theme Options
    + Changed `PW_OPTIONS_THEME` JSON structure
    + Previously `menu.main` as denoting the main menu ID, becomes `menu.primary.id`
    + Requires re-selecting primary menu, and re-saving theme options
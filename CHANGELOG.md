# ArtDroid // Changelog

### Version 1.15
- **Breaking Changes** - Changed Blocks Behavior
    + The sidebar for blocks no longer needs to be defined and set in the Postworld admin. Now, a
    + All widgets from the previous old manually set widget area need to be drag and dropped in the widget manager into the new `Home Page : Feed` widget area.

### Version 1.12
- **Breaking Changes** - Changed Template Names
    + Header and footer templte names have been changed from 'artdroid-header' and 'artdroid-footer' to 'theme-header' and 'theme-footer' respectively.
    + All installations will require re-setting the layout options for the header/footer

### Version 1.0.8
- **Breaking Changes** - Theme Options
    + Changed `PW_OPTIONS_THEME` JSON structure
    + Previously `menu.main` as denoting the main menu ID, becomes `menu.primary.id`
    + Requires re-selecting primary menu, and re-saving theme options
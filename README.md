# Notice Box

A simple WordPress plugin to show a Notice Box by using the following shortcode on any page.

## Features

Following attributes can be used with short code:

- Heading - Heading to be used for Notice Box.
- Message - Message to be shown in Notice Box.
- Same Line - Show heading and message on same line. Folloing "Same Line" attibutes can be used for Notice Box (this attribute is not case sensitive). By default it is set to "0".
  - 1
  - 0
- Box Type - What type of Notice Box to be used. Folloing "Box Type" attibutes can be used for Notice Box (this attribute is not case sensitive). You can add custom css for showing your custom color.
  - Danger
  - Success
  - Info
  - Warning
- Close Button - Show/Hide Close Button. Folloing "Close Button" attibutes can be used for Notice Box (this attribute is not case sensitive). By default it is set to "Show"
.
    - Show
    - Hide


## Installation

Upload the files to the "plugin" folder via FTP and activate the plugin.
    
## FAQ

#### How to show Notice Box on page.

You can use the shortcode to show Notice Box anywhere on the page.
```
[notice_box heading="Notice Box Heading!" message="Notice Box Message." box_type="Danger" close_btn="hide" same_line="0"]
```
## Tech Stack

**Client:** HTML5, CSS3, JavaScript, jQuery, AJAX, PHP.

**Server:** PHP, WordPress


## Authors

- [@bilalbutt](https://github.com/bilalbutt/)

# Bernie WP Theme

## Description

This theme and repo are a tutorial project that roughly follows along with the [Wordpress Theme Handbook.](https://developer.wordpress.org/themes/)

## Structure

The repo is structured into branches that correspond more or less to sections of the handbook. Generally, branches get fleshed out as the numbers go up. The branches:

  1. Theme Structure
   
   This branch follows the Core Concepts section of the handbook. Most of them are blank and only here for illustration of the structure. I removed patterns/example.php and added minimal info to theme.json because having those blank threw errors.

   2. Minimal template parts

  This branch adds enough to template parts to make pages and posts render. The handbook goes into theme.json next but I need to have things onscreen before I can style them.

  3. Global Settings

  This branch roughly follows the Global Settings and Styles section of the handbook.

  4. Templates

  This branch roughly follows the Templates section of the handbook.

  ### Notes

The docs call it out, but the General template part area is called 'uncategorized' in the config.

**

https://developer.wordpress.org/block-editor/reference-guides/core-blocks/ is where the block attributes are listed. 

Example: 
```
<!-- wp:paragraph {"align":"left"} -->
<p class="has-text-align-left">2020 Lomita Blvd,&nbsp;<br>Torrance, CA 90101<br>United States</p>
<!-- /wp:paragraph -->
```

**Block Name: `wp:paragraph`**

This indicates the block type, which is a paragraph block. 

**Props: `{"align":"left"}`**

Define block-specific attributes.

**HTML Output: `<p class="has-text-align-left">`**

Derived from the block's props. 

What other inline classes get derived this way? 

[From the Block Editor ref](https://developer.wordpress.org/block-editor/reference-guides/core-blocks/#paragraph)

```
Paragraph
Start with the basic building block of all narrative. (Source)

Name: core/paragraph
Category: text
Supports: __unstablePasteTextInline, anchor, color (background, gradients, link, text), interactivity (clientNavigation), spacing (margin, padding), typography (fontSize, lineHeight), className
Attributes: align, content, direction, dropCap, placeholder
```

It would be nice to be able to read the ref with some kind of understanding that passing certain/some/all? attrs (eg  `{"align":"left"}`) will result in inline styles (eg `class="has-text-align-left"`) in the HTML output. 

After some poking, ChatGPT gave me this:

| Block Type Group                 | Supported Attributes | Example Assignment                        | Resulting CSS Class(es)                                  |
|----------------------------------|----------------------|-------------------------------------------|----------------------------------------------------------|
| **Text Blocks** (e.g., Paragraph, Heading) | Typography, Color   | `{"fontSize":"large"}`                    | `has-large-font-size`                                    |
|                                  |                      | `{"customTextColor":"#123abc"}`           | `has-text-color`                                         |
| **Media Blocks** (e.g., Image, Video)        | Alignment, Overlay Color | `{"align":"wide"}`                      | `alignwide`                                              |
|                                  |                      | `{"overlayColor":"#000000"}`               | `has-black-overlay-color`                                |
| **Structural Blocks** (e.g., Columns, Group) | Padding, Margin   | `{"style":{"spacing":{"padding":"10px"}}}`| `has-custom-padding`                                     |
|                                  | Gradient Background  | `{"gradient":"linear-gradient(...)"}`      | `has-linear-gradient-background`                         |
| **Special Blocks** (e.g., Cover) | Background Color, Gradient | `{"backgroundColor":"vivid-green"}`    | `has-vivid-green-background-color`                       |
|                                  |                      | `{"customGradient":"linear-gradient(...)}` | `has-custom-gradient-background`                         |
| **Button Block**                 | Text Color, Background Color | `{"style":{"color":{"background":"#333", "text":"#fff"}}}` | `has-text-color-white has-background-color-dark`        |
| **Table Block**                  | Color                | `{"style":{"color":{"background":"#eee"}}}`| `has-background-color-light-grey`                        |
| **Separator Block**              | Color                | `{"color":"vivid-cyan-blue"}`              | `has-vivid-cyan-blue-background-color`                   |
| **General Utility Blocks** (e.g., Group, Cover) | Border Settings | `{"style":{"border":{"color":"#000","width":"2px","style":"solid"}}}` | `has-border-color-black has-border-width-2 has-border-style-solid` |

**Per-block reference:**

Check in https://github.com/WordPress/gutenberg/blob/trunk/packages/block-library/src/ for the block, then look at both block.json and edit.js to learn the details.

This should really be in the ref guide.

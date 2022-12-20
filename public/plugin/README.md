<p align="center">
    <a href="https://n1ed.com/"><img src="https://n1ed.com/img/favicons/favicon-64x64.png" alt="N1ED" /></a>
</p>

<h1 align="center">N1ED</h1>

<p align="center">
    <strong>Create your content block by block using N1ED page builder.</strong>
</p>

<p align="center">
    <a href="https://n1ed.com/">Home page</a> ∙ <a href="https://n1ed.com/doc/install-tinymce-plugin/">Install</a> ∙ <a href="https://n1ed.com/demo/">Try Online</a>
</p>

[![Edit articles with N1ED](https://n1ed.com/img/screenshots/docs/addons/n1ed/n1ed-tinymce.jpg)](https://n1ed.com)

## N1ED is a free plugin for TinyMCE 5 making level-up for your editor.

Main features:

- Adds many new widgets to TinyMCE
- Configure TinyMCE, N1ED and other add-ons visually using Dashboard
- Easy integrations with:
  -- Bootstrap Editor
  -- File Manager
  -- Image Editor
  -- other ecosystem plugins enabled in Dashboard
- Mobile simulation feature and gives you content preview in different display resolutions
- Advanced breadcrumbs integrated with powerful widget editing system
- Useful fullscreen mode
- 3 UI modes:
  -- Classic mode with floating sidebar for editing widgets
  -- Fullscreen-only mode to focus on your content
  -- Dialogs mode like all other plugins which offer to edit widgets in a dialogs
- Always auto updated using CDN

N1ED add-on and Dashboard are absolutely free.


## Installation

Copy ```n1ed``` directory into ```tinymce/plugins/```.
You will have such file path as result: ```tinymce/plugins/n1ed/plugin.js```.


### Edit initialization script
Change configuration you pass into your TinyMCE:
```
tinymce.init(
  {
     ...
     plugins: "n1ed"
     ...
  }
);
```

## Configuration

N1ED being installed is ready to run without any configuration.
If you want to change preferences, use free [Dashboard](https://n1ed.com/dashboard) to edit configuration visually.

[![N1ED configuration](https://n1ed.com/img/screenshots/docs/addons/n1ed/n1ed-configuration.png)​](https://n1ed.com)

You can change this configuration as many times you want and it will be automatically applied to your add-on instance linked to it.

When you've changed your configuration in Dashboard once please make sure you updated the API key in your TinyMCE configuration like:

```
apiKey: "APIKEY12",
```
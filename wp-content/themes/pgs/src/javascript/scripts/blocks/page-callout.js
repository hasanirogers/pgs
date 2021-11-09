const { registerBlockType } = window.wp.blocks;
const { RichText, InspectorControls, ColorPalette, MediaUpload } = window.wp.blockEditor;
const { PanelBody, IconButton } = window.wp.components;


registerBlockType('pgs/page-callout', {
  title: 'Page Callout',
  description: 'Displays a callout info for a page.',
  icon: 'format-image',
  category: 'design',

  // custom attributes
  attributes: {
    title: {
      type: 'string',
      source: 'html',
      selector: 'h2'
    },
    titleColor: {
      type: 'string',
      default: 'black'
    },
    body: {
      type: 'string',
      source: 'html',
      selector: 'p'
    },
    bodyColor: {
      type: 'string',
      default: 'black'
    },
    backgroundColor: {
      type: 'string',
      default: 'white'
    },
    backgroundImage: {
      type: 'string',
      default: null
    },
  },

  edit({ attributes, setAttributes }) {
    const {
        title,
        titleColor,
        body,
        bodyColor,
        backgroundColor,
        backgroundImage,
    } = attributes;

    // custom functions
    const onChangeTitle = (newTitle) => {
      setAttributes({ title: newTitle });
    }

    const onChangeBody = (newBody) => {
      setAttributes({ body: newBody });
    }

    const onTitleColorChange = (newColor) => {
      setAttributes({ titleColor: newColor });
    }

    const onBodyColorChange = (newColor) => {
      setAttributes({ bodyColor: newColor });
    }

    const onBackgroundColorChange = (newBackgroundColor) => {
      setAttributes({ backgroundColor: newBackgroundColor });
    }

    const onSelectImage = (newImage) => {
      setAttributes({ backgroundImage: newImage.sizes.full.url });
    }

    return ([
      <InspectorControls style={{ marginBottom: '40px' }}>
        <PanelBody title={ 'Color Settings' }>
          <p><strong>Title:</strong></p>
          <ColorPalette value={ titleColor } onChange={ onTitleColorChange } />
          <p><strong>Body:</strong></p>
          <ColorPalette value={ bodyColor } onChange={ onBodyColorChange } />
          <p><strong>Background:</strong></p>
          <ColorPalette value={ backgroundColor } onChange={ onBackgroundColorChange } />
        </PanelBody>
        <PanelBody title={ 'Background Image Settings' }>
          <p><strong>Select a Background Image:</strong></p>
          <MediaUpload
            onSelect={ onSelectImage }
            type="image"
            value={ backgroundImage }
            render={ ( { open } ) => (
              <IconButton
                className="editor-media-placeholder__button is-button is-default is-large"
                icon="upload"
                onClick={ open }>
                Background Image
              </IconButton>
            )}
          />
        </PanelBody>
      </InspectorControls>,
      <div className={`page-callout ${backgroundImage ? 'page-callout--has-background' : 'page-callout--no-background'}`} style={{ backgroundImage: `url(${backgroundImage})`, backgroundColor }}>
        <div class="page-callout__container">
          <RichText
            key="editable"
            tagName="h2"
            placeholder="Your Title"
            value={ title }
            onChange={ onChangeTitle }
            style={{ color: titleColor }}
          />
          <RichText
            key="editable"
            tagName="p"
            placeholder="Your Description"
            value={ body }
            onChange={ onChangeBody }
            style={{ color: bodyColor }}
          />
        </div>
      </div>
    ]);
  },

  save({ attributes }) {
    const {
      title,
      titleColor,
      body,
      bodyColor,
      backgroundColor,
      backgroundImage,
  } = attributes;

    return (
      <div className={`page-callout ${backgroundImage ? 'page-callout--has-background' : 'page-callout--no-background'}`} style={{ backgroundImage: `url(${backgroundImage})`, backgroundColor }}>
        <div class="page-callout__container">
          <h2 style={{ color: titleColor }}>{ title }</h2>
          <RichText.Content tagName="p" value={ body } style={{ color: bodyColor }} />
        </div>
      </div>
    );
  }
});

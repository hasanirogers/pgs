const { registerBlockType } = wp.blocks;
const { RichText, InspectorControls, ColorPalette, MediaUpload } = wp.editor;
const { PanelBody, IconButton } = wp.components;


registerBlockType('pgs/page-cta', {
  title: 'Page CTA',
  description: 'Displays a CTA for a page.',
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
    backgroundImage: {
      type: 'string',
      default: null
    },
  },

  edit({ attributes, setAttributes }) {
    const {
        title,
        body,
        titleColor,
        bodyColor,
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
      setAttributes({ bodyColor: newColor })
    }

    const onSelectImage = (newImage) => {
      setAttributes({ backgroundImage: newImage.sizes.full.url });
    }

    return ([
      <InspectorControls style={ { marginBottom: '40px' } }>
        <PanelBody title={ 'Font Color Settings' }>
          <p><strong>Select a Title color:</strong></p>
          <ColorPalette value={ titleColor } onChange={ onTitleColorChange } />
          <p><strong>Select a Body color:</strong></p>
          <ColorPalette value={ bodyColor } onChange={ onBodyColorChange } />
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
      <div class="page-cta" style={{ backgroundImage: `url(${backgroundImage})` }}>
        <RichText
          key="editable"
          tagName="h2"
          placeholder="Your CTA Title"
          value={ title }
          onChange={ onChangeTitle }
          style={{ color: titleColor }}
        />
        <RichText
          key="editable"
          tagName="p"
          placeholder="Your CTA Description"
          value={ body }
          onChange={ onChangeBody }
          style={{ color: bodyColor }}
        />
      </div>
    ]);
  },

  save({ attributes }) {
    const {
      title,
      body,
      titleColor,
      bodyColor,
      backgroundImage
    } = attributes;

    return (
      <div class="page-cta" style={{ backgroundImage: `url(${backgroundImage})` }}>
        <h2 style={{ color: titleColor }}>{ title }</h2>
        <RichText.Content tagName="p" value={ body } style={{ color: bodyColor }} />
      </div>
    );
  }
});

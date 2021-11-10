const { registerBlockType } = window.wp.blocks;
const { RichText, InspectorControls, ColorPalette } = window.wp.blockEditor;
const { PanelBody } = window.wp.components;


registerBlockType('pgs/page-panel', {
  title: 'Page Panel',
  description: 'Displays a panel for a page.',
  icon: 'format-image',
  category: 'design',

  // custom attributes
  attributes: {
    body: {
      type: 'string',
      source: 'html',
      selector: 'div'
    },
    textColor: {
      type: 'string',
      default: 'white'
    },
    backgroundColor: {
      type: 'string',
      default: '#363839'
    }
  },

  edit({ attributes, setAttributes }) {
    const {
        body,
        textColor,
        backgroundColor,
    } = attributes;

    // custom functions
    const onChangeBody = (newBody) => {
      setAttributes({ body: newBody });
    }

    const onTextColorChange = (newTextColor) => {
      setAttributes({ textColor: newTextColor });
    }

    const onBackgroundColorChange = (newBackgroundColor) => {
      setAttributes({ backgroundColor: newBackgroundColor });
    }

    return ([
      <InspectorControls style={{ marginBottom: '40px' }}>
        <PanelBody title={ 'Color Settings' }>
          <p><strong>Text:</strong></p>
          <ColorPalette value={ textColor } onChange={ onTextColorChange } />
          <p><strong>Background:</strong></p>
          <ColorPalette value={ backgroundColor } onChange={ onBackgroundColorChange } />
        </PanelBody>
      </InspectorControls>,
      <div className={`page-panel`} style={{ backgroundColor }}>
        <RichText
          key="editable"
          tagName="div"
          placeholder="Your Content"
          value={ body }
          onChange={ onChangeBody }
          style={{ color: textColor }}
        />
      </div>
    ]);
  },

  save({ attributes }) {
    const {
      body,
      textColor,
      backgroundColor,
  } = attributes;


    return (
      <section className={`page-panel`} style={{ backgroundColor }}>
        <RichText.Content tagName="div" value={ body } style={{ color: textColor }} />
      </section>
    );
  }
});

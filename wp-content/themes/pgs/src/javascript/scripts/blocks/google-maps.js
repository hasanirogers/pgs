const { registerBlockType } = window.wp.blocks;
const { InspectorControls } = window.wp.blockEditor;
const { PanelBody, TextControl } = window.wp.components;

registerBlockType('pgs/google-maps', {
  title: 'Google Maps',
  description: 'Displays a Google Map',
  icon: 'format-image',
  category: 'design',

  // custom attributes
  attributes: {
    url: {
      type: 'string',
      default: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2938.6586803370856!2d-83.11759458411008!3d42.562539930282256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8824c48c67a3846f%3A0x5d7d298ab13d1714!2sPGS%20Inc!5e0!3m2!1sen!2sus!4v1636379899606!5m2!1sen!2sus'
    },
    width: {
      type: 'string',
      default: '100%'
    },
    height: {
      type: 'string',
      default: '480px'
    }
  },

  edit({ attributes, setAttributes }) {
    const {
        url,
        width,
        height,
    } = attributes;

    // custom functions
    const onChangeURL = (newURL) => {
      setAttributes({ url: newURL });
    }

    const onChangeWidth = (newWidth) => {
      setAttributes({ width: newWidth });
    }

    const onChangeHeight = (newHeight) => {
      setAttributes({ height: newHeight });
    }

    return ([
      <InspectorControls style={{ marginBottom: '40px' }}>
        <PanelBody title={ 'Attributes' }>
          <TextControl
            label="URL"
            value={ url }
            onChange={ onChangeURL }
          />
          <TextControl
            label="Width"
            value={ width }
            onChange={ onChangeWidth }
          />
          <TextControl
            label="Height"
            value={ height }
            onChange={ onChangeHeight }
          />
        </PanelBody>
      </InspectorControls>,
      <div className={`google-map`} style={{ border: '1px solid black', position: 'relative' }}>
        <div style={{ position: 'absolute', top: '0', right: '0', bottom: '0', left: '0' }}></div>
        <iframe src={ url } width={ width } height={ height } style={{ border:'0' }} allowfullscreen="" loading="lazy"></iframe>
      </div>
    ]);
  },

  save({ attributes }) {
    const {
      url,
      width,
      height
    } = attributes;

    return (
      <div className={`google-map break-container--full`}>
        <iframe src={ url } width={ width } height={ height }  style={{ border:'0' }} allowfullscreen="" loading="lazy"></iframe>
      </div>
    );
  }
});

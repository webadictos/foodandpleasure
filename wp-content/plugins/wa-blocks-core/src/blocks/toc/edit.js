/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';
import { select } from '@wordpress/data';
import { InspectorControls } from '@wordpress/block-editor';
import {
  Panel,
  PanelBody,
  TextControl,
  PanelRow,
  SelectControl,
  ColorPicker,
} from '@wordpress/components';
/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit(props) {
  const { attributes, setAttributes } = props;

  // Bloque de vista previa en el editor
  const headings = select('core/block-editor')
    .getBlocks()
    .filter(
      block => block.name === 'core/heading' && block.attributes.level === 2
    );

  if (headings.length === 0) {
    return <></>;
  }

  const blockProps = useBlockProps({
    'data-heading': `${attributes.title ? `${attributes.title}` : ''}`,
    className: 'toc-wrapper',
  });

  return (
    <>
      <InspectorControls>
        <Panel>
          <PanelBody title="Leyenda" icon="editor-textcolor">
            <PanelRow>
              <TextControl
                label="Leyenda"
                help="Leyenda para resaltar el callout"
                onChange={newCaption => setAttributes({ title: newCaption })}
                value={attributes.title}
              />
            </PanelRow>
            <PanelRow>
              <ColorPicker
                label="Color del borde"
                color={attributes.borderColor}
                onChangeComplete={color =>
                  setAttributes({ borderColor: color.hex })
                }
              />
            </PanelRow>
          </PanelBody>
        </Panel>
      </InspectorControls>

      <nav
        {...blockProps}
        style={
          attributes.borderColor
            ? { '--toc-main-color': '' + attributes.borderColor + '' }
            : {}
        }
      >
        <ul>
          {headings.map((heading, index) => (
            <li key={heading.clientId}>
              <a href={`#${heading.attributes.anchor}`}>
                {heading.attributes.content}
              </a>
            </li>
          ))}
        </ul>
      </nav>
    </>
  );
}
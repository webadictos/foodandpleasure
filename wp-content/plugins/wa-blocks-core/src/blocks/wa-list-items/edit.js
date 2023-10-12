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
import { createBlock } from '@wordpress/blocks';

import { useBlockProps } from '@wordpress/block-editor';
import { RichText } from '@wordpress/block-editor';
import { withSelect } from '@wordpress/data';

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
function Edit(props) {
  const { attributes, setAttributes, blockIndex, totalBlocks } = props;
  const { contenidoEncabezado, numeroEncabezado } = attributes;

  const paddedBlockIndex = String(blockIndex + 1).padStart(2, '0');

  setAttributes({
    totalEncabezados: totalBlocks,
    numeroEncabezado: paddedBlockIndex,
  });

  return (
    <div {...useBlockProps()}>
      <div class="wa-blocks-core-wa-list-items__item-counter">
        <span class="wa-blocks-core-wa-list-items__item-counter--number">
          {attributes.numeroEncabezado}
        </span>
        <span class="wa-blocks-core-wa-list-items__item-counter--total">
          {attributes.totalEncabezados}
        </span>
      </div>

      <RichText
        tagName="h2"
        value={contenidoEncabezado}
        placeholder="Encabezado"
        className="wa-blocks-core-wa-list-items__item-title"
        onChange={newText => setAttributes({ contenidoEncabezado: newText })}
      />
    </div>
  );
}

export default withSelect((select, ownProps) => {
  const { getBlocks } = select('core/block-editor');
  const { clientId } = ownProps;
  const blocks = getBlocks();

  // Encuentra todos los bloques del mismo tipo que el bloque actual
  const blocksOfSameType = blocks.filter(
    block => block.name === 'wa-blocks-core/wa-list-items'
  );

  const totalBlocks = blocksOfSameType.length;
  // Encuentra el índice del bloque actual entre los bloques del mismo tipo
  const blockIndex = blocksOfSameType.findIndex(
    block => block.clientId === clientId
  );

  return {
    blockIndex,
    totalBlocks,
  };
})(Edit);

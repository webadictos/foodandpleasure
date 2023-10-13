/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';
import { InnerBlocks, RichText } from '@wordpress/block-editor';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
export default function save(props) {
  const { attributes } = props;
  return (
    <div
      {...useBlockProps.save()}
      data-theme={`${attributes.style ? `${attributes.style}` : ''}`}
      data-caption={`${attributes.caption ? `${attributes.caption}` : ''}`}
    >
      <h3 className="wa-blocks-core-callout__heading">
        <RichText.Content value={attributes.heading} />
      </h3>

      <InnerBlocks.Content />
    </div>
  );
}

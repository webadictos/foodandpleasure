/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';
import { select } from '@wordpress/data';

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
  const { title } = attributes;

  // Contenido HTML de la tabla de contenidos para mostrar en el frontend
  const headings = select('core/block-editor')
    .getBlocks()
    .filter(
      block => block.name === 'core/heading' && block.attributes.level === 2
    );

  if (headings.length === 0) {
    return null;
  }

  //   const blockProps = useBlockProps.save({
  //     className: 'toc-wrapper expanded',
  //   });
  const blockProps = useBlockProps.save({
    'data-heading': `${attributes.title ? `${attributes.title}` : ''}`,
    className: 'toc-wrapper',
  });
  return (
    // <nav id="toc" class="toc-wrapper expanded" data-heading="En Este Artículo">
    //                     <ul><li><a href="#en-donde-ver-al-america-vs-chivas-en-vivo">En dónde ver al América vs Chivas en vivo</a></li><li><a href="#en-donde-ver-al-america-vs-chivas-en-vivo-1">En donde ver al america vs chivas en vivo</a></li><li><a href="#en-donde-ver-al-america-vs-chivas-en-vivo-2">En donde ver al america vs chivas en vivo</a></li><li><a href="#en-donde-ver-al-america-vs-chivas-en-vivo">En donde ver al america vs chivas en vivo</a></li><li><a href="#en-donde-ver-al-america-vs-chivas-en-vivo">En donde ver al america vs chivas en vivo</a></li></ul>                        <div class="toc-wrapper-view-all">
    //                         <button class="btn btn-view-all">Ver todo</button>
    //                     </div>
    //                 </nav>
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

      <div class="toc-wrapper-view-all">
        <button class="btn btn-view-all">Ver todo</button>
      </div>
    </nav>
  );
}

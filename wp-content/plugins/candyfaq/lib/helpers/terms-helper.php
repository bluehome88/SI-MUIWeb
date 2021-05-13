<?php
/**
 * Project: Candy FAQ
 * Copyright: 2017-2018 @KonstruktStudio
 */

namespace KSCF;

/**
 * Terms hierarchy helper
 * Class TermsTree
 * @package KSCF
 */
class TermsTree {

	private $taxonomy = null;

	private $terms = null;

	private $tree = null;

	public function __construct($settings) {
		$this->taxonomy = $settings['taxonomy'];

		$this->terms = get_terms($this->taxonomy, array(
			"hide_empty" => false
		));

		$this->tree = $this->build_tree($this->terms);
	}

	/**
	 * Gets tree
	 * @return null
	 */
	public function get_tree() {
		return $this->tree;
	}

	/**
	 * Builds terms tree
	 */
	private function build_tree(&$terms) {
		$tree = array(
			'0' => array(
				'term' => null
			)
		);

		while(!empty($terms)) {
			foreach($terms as $term) {
				if ($this->locate_in_tree($term, $tree, $terms)) {
					continue;
				}
			}
		}

		return $tree['0']['children'];
	}

	/**
	 * Places term in existing tree
	 * @param $term
	 * @param $tree
	 * @param $terms
	 *
	 * @return bool
	 */
	private function locate_in_tree($term, &$tree, &$terms) {
		$is_found = false;

		foreach($tree as $id => $tree_item) {
			if ($term->parent == $id) {
				$is_found = true;

				if (!isset($tree[$id]['children'])) {
					$tree[$id]['children'] = array();
				}

				$this->remove_term_by_id($term->term_id, $terms);

				$tree[$id]['children'][$term->term_id] = array(
					'term' => $term
				);

				break;
			} else {
				if (isset($tree_item['children'])) {
					if ($this->locate_in_tree($term, $tree[$id]['children'], $terms)) {
						$is_found = true;
						break;
					}
				}
			}
		}

		return $is_found;
	}

	/**
	 * Removes term given its id
	 * @param $id
	 * @param $terms
	 */
	private function remove_term_by_id($id, &$terms) {
		$found = null;

		foreach($terms as $index => $term) {
			if ($term->term_id == $id) {
				$found = $index;
				break;
			}
		}

		unset($terms[$found]);
	}

	/**
	 * Renders available terms tree
	 * @param $tree
	 * @param $path
	 */
	public function render_tree($tree, $path = '') {

		if (!sizeof($tree)) {
			?>
			<p><?php esc_html_e('You have no content yet.', 'candy-faq'); ?></p>
			<?php

			return;
		}

		?>
		<ul>
			<?php foreach($tree as $branch):
				$term = $branch["term"];
				$children = isset($branch["children"]) ? $branch["children"] : array();
				$branch_path = ($path ? $path . '/' : '') . $term->name;
				?>
				<li><?php

					$this->render_tree_item($term, $path);

					if (!empty($children)):
						$this->render_tree($children, $branch_path);
					endif;

					?>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php
	}

	/**
	 * Renders single term
     * @param $term
	 */
	protected function render_tree_item($term, $path) {
		?>
		<span data-id="<?php echo esc_attr($term->term_id); ?>"
		      data-count="<?php echo esc_attr($term->count); ?>"
		      data-path="<?php echo esc_attr($path); ?>">
			<i class="fa fa-folder"></i>
			<?php echo esc_html($term->name . ( $term->count ? ' (' . $term->count . ')' : '' )); ?>
		</span>
	<?php
	}
}
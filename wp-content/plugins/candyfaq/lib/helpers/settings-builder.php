<?php
/**
 * Project: Candy FAQ
 * Copyright: 2017-2018 @KonstruktStudio
 */

namespace KSCF;

use Exception;

require_once(PLUGIN_DIR . 'lib/helpers/icon-options.php');
require_once(PLUGIN_DIR . 'lib/helpers/fonts.php');

class SettingsBuilder {

	private $no_tabs = false;

	private $vc = false;

	private $topic = false;

	public function __construct($args = null) {
		if (!isset($args)) {
			return;
		}

		if (isset($args['no_tabs'])) {
			$this->no_tabs = $args['no_tabs'];
		}

		if (isset($args['vc'])) {
			$this->vc = true;
		}

		if (isset($args['topic'])) {
			$this->topic = true;
		}
	}

	protected $tab_open = false;

	public function render_option( $type, $value, $config ) {
		switch ( $type ) {
			case 'checkbox':
				$this->toggle( $value, $config );
				break;

			case 'input':
			case 'input_text':
				$this->input( $value, $config );
				break;

			case 'textarea':
			case 'textarea_text':
				$this->textarea( $value, $config );
				break;

			case 'color':
				$this->color( $value, $config );
				break;

			case 'select':
				$this->select( $value, $config );
				break;

			case 'page_select':
				$this->page_select( $value, $config );
				break;

			case 'icon_select':
				$this->icon_select( $value, $config );
				break;

			case 'image_select':
				$this->image_select( $value, $config );
				break;

			case 'term_select':
				$this->term_select( $value, $config );
				break;

			case 'tab':
				$this->open_tab_container( $config );
				break;

			case 'title':
				$this->title( $value, $config );
				break;

			case 'code':
				$this->code( $value, $config );
				break;

			case 'layout_editor':
				$this->layout_editor( $value, $config );
				break;

			case 'font':
				$this->font( $value, $config );
				break;

			case 'google_font_weights':
				$this->google_font_weights( $value, $config );
				break;

			case 'google_font_languages':
				$this->google_font_languages( $value, $config );
				break;

			case 'css_size':
				$this->css_size( $value, $config );
				break;

			case 'warning':
				$this->warning( $value, $config );
				break;

			case 'info':
				$this->info( $value, $config );
				break;

			case 'preset':
				$this->preset( $value, $config );
				break;

			default:
				break;
		}
	}

	public function render_tab_links( $options ) {
		$tabs = array_filter( $options, function ( $option ) {
			return $option["type"] === "tab";
		} );
		?>
		<div class="mkb-settings-tabs">
			<ul>
				<?php
				foreach ( $tabs as $tab ):
					?>
					<li class="mkb-settings-tab">
						<a href="#mkb_tab-<?php echo esc_attr( $tab["id"] ); ?>">
							<i class="mkb-settings-tab__icon fa fa-lg <?php echo esc_attr($tab["icon"]); ?>"></i>
							<?php echo esc_html( $tab["label"] ); ?>
						</a>
					</li>
				<?php
				endforeach;
				?>
			</ul>
		</div>
	<?php
	}

	protected function open_tab_container( $config ) {
		$this->close_tab_container();

		$this->tab_open = true;
		?>
		<div id="mkb_tab-<?php echo esc_attr( $config["id"] ); ?>" class="mkb-settings-tab__container">
	<?php
	}

	public function close_tab_container() {
		if ( $this->tab_open ) {
			?></div><?php
		}

		$this->tab_open = false;
	}

	protected function render_label($config) {
		if (!array_key_exists('label', $config)) {
			return;
		}

		?>
		<label class="mkb-setting-label" for="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>">
			<?php echo esc_html( $this->get_label( $config ) ); ?>
		</label>
	<?php
	}

	protected function render_description($config) {
		if ($this->topic || !array_key_exists('description', $config)) {
			return;
		}

		?>
		<div class="mkb-setting-description"><?php echo wp_kses_post($config["description"]); ?></div>
	<?php
	}

	protected function maybe_print_dependency_attribute($config) {
		if (!isset($config['dependency'])) {
			return;
		}

		echo ' data-dependency="'. esc_attr(json_encode($config['dependency'])) . '"';
	}

	protected function get_id_key( $config, $postfix = '' ) {
		if ($postfix) {
			$postfix = '_' . $postfix;
		}

		if ($this->topic) {
			return 'term_meta[' . $config["id"] . $postfix . ']';
		}

		return OPTION_PREFIX . $config["id"] . $postfix;
	}

	protected function get_name_key( $config, $postfix = '' ) {

		if ($postfix) {
			$postfix = '_' . $postfix;
		}

		if ($this->vc) {
			return $config["id"] . $postfix;
		} else if ($this->topic) {
			return 'term_meta[' . $config["id"] . $postfix . ']';
		} else {
			return OPTION_PREFIX . $config["id"] . $postfix;
		}
	}

	protected function get_label( $config ) {
		return $this->topic ? '' : $config['label'];
	}

	protected function checkbox( $value, $config ) {
		?>
		<div class="mkb-control-wrap fn-control-wrap"
		     data-type="checkbox"
		     data-name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			<?php self::maybe_print_dependency_attribute($config); ?>>
			<label for="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>">
				<?php echo esc_html( $this->get_label( $config ) ); ?>
			</label>
			<input class="fn-control"
			       type="checkbox"
			       id="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>"
			       name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
				<?php if ( $value === true || $value === 'true' ) {
					echo 'checked="checked"';
				} ?>
				/>
			<?php $this->render_description($config); ?>
		</div>
	<?php
	}

	public function toggle( $value, $config ) {
		?>
		<div class="mkb-control-wrap fn-control-wrap"
		     data-type="toggle"
		     data-name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			<?php self::maybe_print_dependency_attribute($config); ?>>

			<div class="mkb-toggle-label">
				<?php echo esc_html( $this->get_label( $config ) ); ?>
			</div>

			<div class="mkb-switch">
				<input id="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>"
				       name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
				       class="fn-control mkb-toggle mkb-toggle-round wpb_vc_param_value"
						<?php if (!$this->topic):?>
							value="<?php echo in_array($value, array(true, 'true', 'on'), true) ? 'on' : 'off'; ?>"
						<?php endif; ?>
					<?php if ( in_array($value, array(true, 'true', 'on'), true) ) {
						echo 'checked="checked"';
					} ?>
				       type="checkbox" />
				<label for="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>"></label>
			</div>

			<?php $this->render_description($config); ?>
		</div>
	<?php
	}

	protected function input( $value, $config ) {
		?>
		<div class="mkb-control-wrap fn-control-wrap"
		     data-type="input"
		     data-name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			<?php self::maybe_print_dependency_attribute($config); ?>>
			<?php $this->render_label($config); ?>
			<input class="fn-control"
			       type="text"
			       id="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>"
			       name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			       value="<?php echo esc_attr( $value ); ?>"
				/>
			<?php $this->render_description($config); ?>
		</div>
	<?php
	}

	protected function textarea( $value, $config ) {

		$rows = isset($config["height"]) ? $config["height"] : 10;
		$cols = isset($config["width"]) ? $config["width"] : 60;

		?>
		<div class="mkb-control-wrap fn-control-wrap"
		     data-type="textarea"
		     data-name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			<?php self::maybe_print_dependency_attribute($config); ?>>
			<?php $this->render_label($config); ?>
			<textarea class="fn-control"
			          class="mkb-settings-textarea"
			       id="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>"
			       name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			       rows="<?php echo esc_html($rows); ?>"
			       cols="<?php echo esc_html($cols); ?>"
				><?php echo wp_kses_post( $value ); ?></textarea>
			<?php $this->render_description($config); ?>
		</div>
	<?php
	}

	protected function color( $value, $config ) {
		?>
		<div class="mkb-control-wrap fn-control-wrap"
		     data-type="color"
		     data-name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			<?php self::maybe_print_dependency_attribute($config); ?>>
			<label for="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>">
				<?php echo esc_html( $this->get_label( $config ) ); ?>
			</label>
			<input type="text"
			       class="mkb-color-picker fn-control"
			       id="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>"
			       name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			       value="<?php echo esc_attr( $value ); ?>"
				/>
			<?php $this->render_description($config); ?>
		</div>
	<?php
	}

	protected function select( $value, $config ) {
		?>
		<div class="mkb-control-wrap fn-control-wrap"
		     data-type="select"
		     data-name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			<?php self::maybe_print_dependency_attribute($config); ?>>
			<label for="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>">
				<?php echo esc_html( $this->get_label( $config ) ); ?>
			</label>

			<select class="fn-control"
			        id="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>"
			        name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>">
				<?php
				foreach ( $config["options"] as $key => $label ):
					?><option value="<?php echo esc_attr( $key ); ?>"<?php
					if ($key == $value) {echo ' selected="selected"'; }
					?>><?php echo esc_html( $label ); ?></option><?php
				endforeach;
				?>
			</select>
			<?php $this->render_description($config); ?>
		</div>
	<?php
	}

	protected function page_select( $value, $config ) {
		?>
		<div class="mkb-control-wrap fn-control-wrap"
		     data-type="page_select"
		     data-name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			<?php self::maybe_print_dependency_attribute($config); ?>>
			<label for="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>">
				<?php echo esc_html( $this->get_label( $config ) ); ?>
			</label>

			<span class="mkb-page-select-wrap fn-page-select-wrap">
				<select class="fn-control"
				        id="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>"
				        name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>">
					<?php
					foreach ( $config["options"] as $key => $label ):
						?><option value="<?php echo esc_attr( $key ); ?>"<?php
						if ($key == $value) {echo ' selected="selected"'; }
						?> data-link="<?php echo esc_attr(get_the_permalink($key)); ?>"><?php echo esc_html( $label ); ?></option><?php
					endforeach;
					?>
				</select>
				<a class="mkb-page-select-link fn-page-select-link mkb-unstyled-link mkb-disabled" href="#" target="_blank">
					<?php _e( 'Open page', 'candy-faq' ); ?> <i class="fa fa-external-link-square"></i>
				</a>
			</span>
			<?php $this->render_description($config); ?>
		</div>
	<?php
	}

	/**
	 * Icon selector
	 * @param $value
	 * @param $config
	 */
	protected function icon_select( $value, $config ) {
		$icon_options = kscf_icon_options();

		?>
		<div class="mkb-control-wrap fn-control-wrap"
		     data-type="icon_select"
		     data-name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			<?php self::maybe_print_dependency_attribute($config); ?>>
			<label for="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>">
				<?php echo esc_html( $this->get_label( $config ) ); ?>
			</label>

			<input class="fn-control mkb-icon-hidden-input" type="hidden"
			       id="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>"
			       name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			       value="<?php echo esc_attr( $value ); ?>"
				/>

			<div class="mkb-icon-button">
				<a href="#" class="mkb-icon-button__link mkb-button mkb-unstyled-link">
					<i class="mkb-icon-button__icon fa fa-lg <?php echo esc_attr( $value ); ?>"></i>
					<span class="mkb-icon-button__text"><?php echo esc_html( $value ); ?></span>
				</a>
			</div>
			<div class="mkb-icon-select-filter mkb-hidden">
				<input placeholder="Type keyword to filter" type="text" />
			</div>
			<div class="mkb-icon-select mkb-hidden">
				<?php
				foreach ( $icon_options as $key => $label ):
					?>
					<span data-mkb-icon="<?php echo esc_attr($key); ?>" class="mkb-icon-select__item<?php if ($key == $value) { echo ' mkb-icon-selected'; } ?>">
						<i class="fa fa-lg <?php echo esc_attr($key); ?>"></i>
					</span>
				<?php
				endforeach;
				?>
			</div>
			<?php $this->render_description($config); ?>
		</div>
	<?php
	}

	public function image_select( $value, $config ) {
		?>
		<div class="mkb-control-wrap fn-control-wrap"
		     data-type="image_select"
		     data-name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			<?php self::maybe_print_dependency_attribute($config); ?>>
			<label for="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>">
				<?php echo esc_html( $this->get_label( $config ) ); ?>
			</label>

			<input class="fn-control mkb-image-hidden-input wpb_vc_param_value" type="hidden"
			       id="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>"
			       name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			       value="<?php echo esc_attr( $value ); ?>"
				/>

			<div class="mkb-image-select">
				<ul>
					<?php
					foreach ( $config["options"] as $key => $item ):
						?>
						<li data-value="<?php echo esc_attr( $key ); ?>"
						    class="mkb-image-select__item<?php
						if ($key == $value) {echo ' mkb-image-selected'; } ?>">
							<span class="mkb-image-wrap">
								<img src="<?php echo esc_attr($item["img"]); ?>"
							     class="mkb-image-select__image" />
								<span class="mkb-image-selected__checkmark">
									<i class="fa fa-lg fa-check-circle"></i>
								</span>
								</span>
							<span class="mkb-image-select__item-label">
								<?php echo esc_html( $item["label"] ); ?>
							</span>
						</li>
					<?php
					endforeach;
					?>
				</ul>
			</div>

			<?php $this->render_description($config); ?>
		</div>
	<?php
	}

	public function layout_select( $value, $config ) {
		$options = $config['options'];

		$value = isset( $value ) && ! empty( $value ) ?
			array_map( function ( $item ) {
				return $item;
			}, explode( ",", $value ) ) :
			array();

		if (!empty($options)) {
			$available = array_filter($options, function($item) use ($value) {
				return !in_array($item['key'], $value);
			});

			$selected = array_filter($options, function($item) use ($value) {
				return in_array($item['key'], $value);
			});

			if (isset($selected) && !empty($selected)) {
				usort($selected, function($a, $b) use ($value) {
					return array_search($a['key'], $value) < array_search($b['key'], $value) ? -1 : 1;
				});
			}
		}

		?>
		<div class="mkb-control-wrap fn-control-wrap"
		     data-type="layout_select"
		     data-name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			<?php self::maybe_print_dependency_attribute($config); ?>>
			<label for="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>">
				<?php echo esc_html( $this->get_label( $config ) ); ?>
			</label>

			<input class="fn-control mkb-layout-hidden-input wpb_vc_param_value" type="hidden"
			       id="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>"
			       name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			       value="<?php echo esc_attr( implode(",", $value) ); ?>" />

			<div class="mkb-layout-select">

				<div class="mkb-layout-select__available mkb-layout-select__container">
					<?php
					if ( isset( $available ) && ! empty( $available ) ):
						foreach ( $available as $item ):
							?>
							<div data-value="<?php echo esc_attr( $item['key'] ); ?>"
							     class="mkb-layout-select__item">
								<?php echo esc_html( $item['label'] ); ?>
							</div>
						<?php
						endforeach;
					endif;
					?>
				</div>

				<div class="mkb-layout-select__selected mkb-layout-select__container">
					<?php
					if ( isset( $selected ) && ! empty( $selected ) ):
						foreach ( $selected as $item ):
							?>
							<div data-value="<?php echo esc_attr( $item['key'] ); ?>"
							     class="mkb-layout-select__item">
								<?php echo esc_html( $item['label'] ); ?>
							</div>
						<?php
						endforeach;
					endif;
					?>
				</div>
			</div>

			<?php $this->render_description($config); ?>
		</div>
	<?php
	}

	/**
	 * Select from a term tree
	 * @param $value
	 * @param $config
	 */
	public function term_select( $value, $config ) {
		$tax = $config['tax'];

		if (!taxonomy_exists($tax)) {
			echo '<p>' . __( 'Error: taxonomy does not exist.', 'candy-faq' ) . '</p>';
			return;
		}

		$value = isset( $value ) && ! empty( $value ) ?
			array_map( function ( $item ) {
				return (int)$item;
			}, explode( ",", $value ) ) :
			array();

		?>
		<div class="mkb-control-wrap fn-control-wrap"
		     data-type="term_select"
		     data-name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			<?php self::maybe_print_dependency_attribute($config); ?>>
			<label for="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>">
				<?php echo esc_html( $this->get_label( $config ) ); ?>
			</label>

			<input class="fn-control fn-terms-select-store mkb-term-select-hidden-input wpb_vc_param_value" type="hidden"
			       id="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>"
			       name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			       value="<?php echo esc_attr( implode(",", $value) ); ?>" />

			<?php

			$terms = get_terms($tax, array(
				"hide_empty" => false
			));

			$terms_tree = $this->build_terms_tree($terms);

			if (!empty($terms_tree)) {
				?>
				<div class="fn-terms-tree mkb-terms-tree">
					<form action="" novalidate>
						<?php
						$this->render_tree($terms_tree, $this->get_id_key( $config ), '', $value);
						?>
					</form>
				</div>

				<div class="fn-terms-selected mkb-terms-selected">
					<ul>
						<?php

						if ($value && !empty($value)) {
							$selected_data = $this->get_selected_terms($terms_tree, '', $value);

							foreach($value as $selected):

								$term = term_exists( $selected, $tax );
								if ( $term == 0 || $term == null ) {
									continue;
								}

								$item_info = $selected_data['term_' . $selected];
								?>
								<li data-id="<?php echo esc_attr($selected); ?>">
									<span><?php echo esc_html($item_info['path']); ?></span>
									<?php echo esc_html($item_info['name']); ?>
								</li>
							<?php

							endforeach;

						}

						?>
					</ul>
				</div>
			<?php
			}

			?>
			<?php $this->render_description($config); ?>
		</div>
	<?php
	}

	/**
	 * Renders available terms tree
	 * @param $tree
	 * @param $option_id
	 * @param $path
	 * @param $value
	 */
	private function render_tree($tree, $option_id, $path, $value) {
		?>
		<ul>
			<?php foreach($tree as $branch):
				$term = $branch["term"];
				$children = isset($branch["children"]) ? $branch["children"] : array();
				$branch_path = ($path ? $path . '/' : '') . $term->name;
				$is_selected = in_array((int)$term->term_id, $value, true);
				?>
				<li>
					<span data-id="<?php echo esc_attr($term->term_id); ?>"
					      data-count="<?php echo esc_attr($term->count); ?>"
					      data-path="<?php echo esc_attr($path); ?>"<?php if ($is_selected) {
						?> class="mkb-term-selected"<?php
					} ?>>
						<i class="fa fa-folder"></i>
						<?php echo esc_html($term->name . ($term->count ? ' (' . $term->count . ')' : '')); ?>

						<input type="checkbox"
						       id="term_select_<?php echo esc_attr($term->term_id . '_' . $option_id); ?>"
						       name="term_select_<?php echo esc_attr($term->term_id . '_' . $option_id); ?>"
							<?php if ( $is_selected ) {
								echo 'checked="checked"';
							} ?>

							/>
						<label for="term_select_<?php echo esc_attr($term->term_id . '_' . $option_id); ?>"></label>

					</span>
					<?php
					if (!empty($children)):
						$this->render_tree($children, $option_id, $branch_path, $value);
					endif;
					?>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php
	}

	/**
	 * Renders selected terms recursively
	 * @param $tree
	 * @param $path
	 * @param $value
	 */
	private function get_selected_terms($tree, $path, $value) {
		if (!$value || empty($value)) {
			return array();
		}

		$selected = array();

		foreach($tree as $branch):
			$term = $branch["term"];
			$children = isset($branch["children"]) ? $branch["children"] : array();
			$branch_path = ($path ? $path . '/' : '') . $term->name;

			if (in_array((int)$term->term_id, $value, true)) {
				$selected['term_' . $term->term_id] = array(
					'path' => $path,
					'name' => $term->name . ($term->count ? ' (' . $term->count . ')' : '')
				);
			}

			if (!empty($children)){
				$selected = array_merge($selected, $this->get_selected_terms($children, $branch_path, $value));
			}
		endforeach;

		return $selected;
	}

	/**
	 * Builds hierarchical terms tree
	 * @param $terms
	 *
	 * @return mixed
	 */
	private function build_terms_tree(&$terms) {
		$tree = array(
			'0' => array(
				'term' => null
			)
		);

		while(!empty($terms)) {
			foreach($terms as $term) {
				if ($this->locate_in_term_tree($term, $tree, $terms)) {
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
	private function locate_in_term_tree($term, &$tree, &$terms) {
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
					if ($this->locate_in_term_tree($term, $tree[$id]['children'], $terms)) {
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

	protected function title( $value, $config ) {
		?>
		<div class="mkb-control-wrap fn-control-wrap"
		     data-type="title"
		     data-name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			<?php self::maybe_print_dependency_attribute($config); ?>>
			<div class="mkb-settings-title-wrap">
				<div class="mkb-settings-title"><?php echo esc_html( $this->get_label( $config ) ); ?>
					<?php if(isset($config['preview_image'])): ?>
						<i class="mkb-settings-preview fa fa-eye"></i>
					<?php endif; ?>
				</div>
				<?php if(isset($config['preview_image'])): ?>
				<div class="mkb-setting-preview-image"
				     style="<?php if (isset($config['width'])) { echo esc_attr("width: " . $config['width'] . "px;"); } ?>">
					<img src="<?php echo esc_attr($config['preview_image']); ?>" alt="<?php echo esc_attr( $this->get_label( $config ) ); ?>"/>
				</div>
				<?php endif; ?>
			</div>

			<?php $this->render_description($config); ?>
		</div>
	<?php
	}

	protected function code( $value, $config ) {
		?>
		<div class="mkb-control-wrap fn-control-wrap"
		     data-type="code"
		     data-name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			<?php self::maybe_print_dependency_attribute($config); ?>>
			<div class="mkb-settings-code-wrap">
				<h3 class="mkb-code-title"><?php echo esc_html( $this->get_label( $config ) ); ?></h3>
				<code class="mkb-setting-code">
					<?php echo wp_kses_post($config["default"]); ?>
				</code>
			</div>

			<?php $this->render_description($config); ?>
		</div>
	<?php
	}

	/**
	 * Font
	 * @param $value
	 * @param $config
	 */
	protected function font( $value, $config ) {
		$fonts_list = kscf_get_all_fonts();
		?>
		<div class="mkb-control-wrap fn-control-wrap"
		     data-type="font"
		     data-name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			<?php self::maybe_print_dependency_attribute($config); ?>>
			<label for="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>">
				<?php echo esc_html( $this->get_label( $config ) ); ?>
			</label>
			<select class="fn-control"
			        id="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>"
			        name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>">
				<?php
				foreach ( $fonts_list as $group ):
					?>
					<optgroup label="<?php echo esc_attr( $group["id"] ); ?>"><?php
					foreach ( $group["fonts"] as $key => $label ): ?>
						<option value="<?php echo esc_attr( $key ); ?>"<?php
						if ( $key == $value ) {
							echo ' selected="selected"';
						}
						?>><?php echo esc_html( $label ); ?></option><?php
					endforeach;
					?></optgroup><?php
				endforeach
				?>
			</select>

			<?php $this->render_description($config); ?>
		</div>
	<?php
	}

	/**
	 * Font weights to load
	 * @param $value
	 * @param $config
	 */
	protected function google_font_weights( $value, $config ) {
		$weights_list = kscf_get_all_gf_weights();

		$value = is_array($value) ? $value : array();

		?>
		<div class="mkb-control-wrap fn-control-wrap"
		     data-type="google_font_weights"
		     data-name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			<?php self::maybe_print_dependency_attribute($config); ?>>
			<label for="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>">
				<?php echo esc_html( $this->get_label( $config ) ); ?>
			</label>
			<select multiple class="fn-control"
			        id="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>"
			        name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>">
				<?php
					foreach ( $weights_list as $key => $label ): ?>
						<option value="<?php echo esc_attr( $key ); ?>"<?php
						if ( in_array($key, $value) ) {
							echo ' selected="selected"';
						}
						?>><?php echo esc_html( $label ); ?></option><?php
					endforeach;
				?>
			</select>

			<?php $this->render_description($config); ?>
		</div>
	<?php
	}

	/**
	 * Font languages to load
	 * @param $value
	 * @param $config
	 */
	protected function google_font_languages( $value, $config ) {
		$languages_list = kscf_get_all_gf_languages();

		$value = is_array($value) ? $value : array();

		?>
		<div class="mkb-control-wrap fn-control-wrap"
		     data-type="google_font_languages"
		     data-name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			<?php self::maybe_print_dependency_attribute($config); ?>>
			<label for="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>">
				<?php echo esc_html( $this->get_label( $config ) ); ?>
			</label>
			<select multiple class="fn-control"
			        id="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>"
			        name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>">
				<?php
				foreach ( $languages_list as $key => $label ): ?>
					<option value="<?php echo esc_attr( $key ); ?>"<?php
					if ( in_array($key, $value) ) {
						echo ' selected="selected"';
					}
					?>><?php echo esc_html( $label ); ?></option><?php
				endforeach;
				?>
			</select>

			<?php $this->render_description($config); ?>
		</div>
	<?php
	}

	/**
	 * Font languages to load
	 * @param $value
	 * @param $config
	 */
	public function css_size( $value, $config ) {
		$units = array(
			'px' => 'px',
			'rem' => 'rem',
			'em' => 'em',
			'%' => '%'
		);

		if (isset($config["units"])) {
			$units = array_filter($units, function($value) use ($config) {
				return in_array($value, $config["units"]);
			});
		}

		$default = $config['default'];

		if (is_string($value)) {
			$unit_value = $default['unit'];
			$size_value = $default['size'];

			foreach($units as $unit) {
				if (strpos($value, $unit) !== false) {
					$unit_value = $unit;
					$size_value = (float) str_replace($unit, '', $value);
					break;
				}
			}

			$value = array("unit" => $unit_value, "size" => $size_value);
		}

		$selected_unit = is_array($value) && isset($value["unit"]) ? $value["unit"] : $default['unit'];
		$selected_size = is_array($value) && isset($value["size"]) ? $value["size"] : $default['size'];

		?>
		<div class="mkb-control-wrap fn-control-wrap"
		     data-type="css_size"
		     data-name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			<?php self::maybe_print_dependency_attribute($config); ?>>

			<label for="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>">
				<?php echo esc_html( $this->get_label( $config ) ); ?>
			</label>
			<div class="mkb-css-size">

				<input name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
				       class="fn-css-size-store wpb_vc_param_value" type="hidden" value="<?php echo esc_attr( $value['size'] . $value['unit'] ); ?>" />

				<input class="fn-css-size-value fn-control mkb-css-size__input"
				       type="text"
				       id="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>"
				       name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
				       value="<?php echo esc_attr( $selected_size ); ?>" /><?php
				?><ul class="mkb-css-size__units"><?php
					foreach($units as $unit):
						?><li><a href="#" class="fn-css-unit mkb-unstyled-link mkb-css-unit<?php if ($unit === $selected_unit) {
								echo esc_attr(' mkb-css-unit--selected');
							} ?>" data-unit="<?php echo esc_attr($unit); ?>"><?php echo esc_html($unit); ?></a></li><?php
					endforeach;
					?></ul>
				<input class="fn-css-size-unit-value mkb-css-size__unit-input"
				       type="hidden"
				       name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>_unit"
				       value="<?php echo esc_attr( $selected_unit ); ?>" />
			</div>

			<?php $this->render_description($config); ?>
		</div>
	<?php
	}

	public static function css_size_to_string($value) {
		if (is_string($value)) {
			if (strpos($value, 'unit') !== false) {
				try {
					$value = json_decode($value, true);
				} catch (Exception $e) {}
			} else {
				return $value;
			}
		}

		return $value["size"] . $value["unit"];
	}

	/**
	 * Control warning
	 * @param $value
	 * @param $config
	 */
	protected function warning( $value, $config ) {
		if (isset($config['show_if']) && !$config['show_if']) {
			return;
		}

		?>
		<div class="mkb-control-wrap"
		     data-type="warning"
		     data-name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			<?php self::maybe_print_dependency_attribute($config); ?>>
			<div class="mkb-control-note mkb-control-note--warning">
				<i class="mkb-control-note__icon fa fa-exclamation-triangle"></i>
				<span class="mkb-control-note__label"><?php echo esc_html( $this->get_label( $config ) ); ?></span>
			</div>
		</div>
	<?php
	}

	/**
	 * Control info
	 * @param $value
	 * @param $config
	 */
	protected function info( $value, $config ) {
		if (isset($config['show_if']) && !$config['show_if']) {
			return;
		}

		?>
		<div class="mkb-control-wrap"
		     data-type="info"
		     data-name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			<?php self::maybe_print_dependency_attribute($config); ?>>
			<div class="mkb-control-note mkb-control-note--info">
				<i class="mkb-control-note__icon fa fa-info-circle"></i>
				<span class="mkb-control-note__label"><?php echo $this->get_label( $config ); ?></span>
			</div>
		</div>
	<?php
	}

	/**
	 * Preset control
	 * @param $value
	 * @param $config
	 */
	protected function preset( $value, $config ) {
		if (isset($config['show_if']) && !$config['show_if']) {
			return;
		}

		?>
		<div class="mkb-control-wrap"
		     data-type="preset"
		     data-name="<?php echo esc_attr( $this->get_name_key( $config ) ); ?>"
			<?php self::maybe_print_dependency_attribute($config); ?>>

			<label for="<?php echo esc_attr( $this->get_id_key( $config ) ); ?>">
				<?php echo esc_html( $this->get_label( $config ) ); ?>
			</label>

			<div class="mkb-current-export" style="display: none;">
				<textarea name="" id="" cols="30" rows="10" style="margin: 1em 0; min-height: 20em;" readonly><?php
					foreach($config['fields'] as $field):
						$saved_value = Options::option($field);
						if (is_array($saved_value)) {
							$saved_value = json_encode($saved_value, true);
						}

						echo "'" . $field . "' => " . "'" . $saved_value . "',\n";
					endforeach;
				?></textarea>
			</div>

			<div class="mkb-options-preset-wrap">
				<?php foreach($config['options'] as $key => $preset): ?>
					<span class="mkb-preset-item">
						<a href="#" class="fn-mkb-preset-link"
						   data-field="<?php esc_attr_e($config["id"]); ?>"
						   data-preset="<?php esc_attr_e($key); ?>">
							<img src="<?php echo esc_url($preset['img']); ?>" />
						</a>
						<span class="mkb-preset-item-label">
							<?php echo esc_html($preset['label']); ?>
						</span>
					</span>
				<?php endforeach; ?>
			</div>

			<?php $this->render_description($config); ?>
		</div>
	<?php
	}
}
<?php if (function_exists('pll_the_languages'))
{
    $args = array(
        'raw' => 1,
        'hide_if_empty' => 1,
        'hide_if_no_translation' => 1,
        'hide_current' => 1
    );
    $langs = pll_the_languages($args);

    if ($langs)
    { ?>
				<div class="pll-lang-switcher">
					<ul>
							<?php

						foreach ($langs as $lang)
						{
							$is_current = $lang['current_lang'];

							if ($is_current)
							{ ?>
									<li class="pll-current-lang">
										<img width="30" height="30" src="<?= $lang['flag']; ?>" alt="<?=strtoupper($lang['slug']); ?>">
									</li>
									<?php
							}
							else
							{ ?>
									<li>
										<a href="<?=$lang['url']; ?>">
											<img src="<?= $lang['flag']; ?>" alt="<?=strtoupper($lang['slug']); ?>">
										</a>
									</li>
								<?php
							}
        		}
						?>
					</ul>
				</div>
			<?php
    }
} ?>

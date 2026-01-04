<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\Service;

use Vigihdev\WpAssets\Contracts\Manager\JsLocalizerManagerInterface;
use Vigihdev\WpAssets\Contracts\ScriptLocalizeInterface;
use Vigihdev\WpAssets\DTOs\ScriptLocalizeDto;

final class JsLocalizerManager implements JsLocalizerManagerInterface
{

    /**
     *
     * @param ScriptLocalizeDto $localize
     * @return void
     */
    public function __construct(
        private readonly ScriptLocalizeInterface $localize,
    ) {}

    public function publish(): void
    {
        $localize = $this->localize;
        add_action('wp_enqueue_scripts', function () use ($localize) {
            wp_register_script($localize->getHandle(), '', $localize->getDepends(), false, true);

            wp_localize_script($localize->getHandle(), $localize->getVariableName(), [
                'ajaxurl' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce($localize->getNonce()),
                'actions' => $localize->getActions(),
            ]);

            wp_enqueue_script($localize->getHandle());
        });
    }
}

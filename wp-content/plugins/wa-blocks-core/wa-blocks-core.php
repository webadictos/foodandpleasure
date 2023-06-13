<?php

/**
 * Plugin name: WA Blocks Core
 */

if (!function_exists("wa_blocks_core_register_blocks")) {
    function wa_blocks_core_register_blocks()
    {
        register_block_type(__DIR__ . "/build/blocks/info-card");
        register_block_type(__DIR__ . "/build/blocks/wa-places");
    }
}

add_action("init", "wa_blocks_core_register_blocks");

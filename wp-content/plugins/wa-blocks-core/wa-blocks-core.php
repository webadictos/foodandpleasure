<?php

/**
 * Plugin name: WA Blocks Core
 */

if (!function_exists("wa_blocks_core_register_blocks")) {
    function wa_blocks_core_register_blocks()
    {
        // register_block_type(__DIR__ . "/build/blocks/info-card");
        // register_block_type(__DIR__ . "/build/blocks/wa-places");
        register_block_type(__DIR__ . "/build/blocks/wa-internal-link");
        register_block_type(__DIR__ . "/build/blocks/wa-list-items");
        register_block_type(__DIR__ . "/build/blocks/callout");
        register_block_type(__DIR__ . "/build/blocks/toc");
        register_block_type(__DIR__ . "/build/blocks/tabla-contenidos");


    }
}

add_action("init", "wa_blocks_core_register_blocks");

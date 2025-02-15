<?php

declare(strict_types=1);

function is_input_empty(string $id): bool {
    return empty(trim($id));
}

function is_id_invalid(string $id): bool {
    return !ctype_digit($id);
}

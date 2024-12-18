<?php

namespace App\Traits;

trait HighlightName
{

    public function highlightMatchedText($search): array|string|null
    {
        $text = $this->name;
        if (!$search) {
            return e($text); // Return plain text if no search query
        }

        // Use regex to wrap matched text in a <span>
        return preg_replace('/(' . preg_quote($search, '/') . ')/i', '<span class="bg-warning-subtle text-warning-emphasis">$1</span>', $text);
    }
}

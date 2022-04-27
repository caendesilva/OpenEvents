<?php

namespace App\Core\Services\Markdown\PostProcessors;

class InjectsAuthUserData extends \DeSilva\Lagrafo\PostProcessors\AuthenticatedPostProcessor
{
    public function process($html): string
    {
        $html = str_replace('<replace_with_your_endpoint>', $this->user->project()->getEndpoint(), $html);
        $html = str_replace('&lt;replace_with_your_endpoint&gt;', $this->user->project()->getEndpoint(), $html);

        $html = str_replace('%%auth_user_name%%', $this->user->name, $html);

        $html = str_replace('%%auth_user_events_dashboard%%', route('projects.show', [
			'project' => $this->user->humanoID(),
		]), $html);

        return $html;
    }
}

<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use App\Http\Controllers\BackupController;
use Brightspot\Nova\Tools\DetachedActions\DetachedAction;


class RestoreFromBackup extends DetachedAction
{
    use InteractsWithQueue, Queueable;

    public function label()
    {
        return __('Restore database from last backup');
    }
    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        $backup = new BackupController();
        $backup->back_up_from_last_archive();

        return DetachedAction::message('Your database has been restored!');
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [];
    }
}

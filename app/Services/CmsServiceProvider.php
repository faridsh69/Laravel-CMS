<?php
use App\Models\Activity;

function activity(string $title = null)
{
    $activity = new Activity();
    $activity->title = $title;

    return $activity;
}

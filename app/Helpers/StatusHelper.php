<?php

namespace App\Helpers;

class StatusHelper
{
    public static function getStatusLabel($status)
    {
        $labels = [
            'estimate' => 'Estimate',
            'sent_estimate' => 'Sent Estimate',
            'unassigned' => 'Unassigned',
            'assigned' => 'Assigned',
            'inProgress' => 'In Progress',
            'pending' => 'Pending',
            'done' => 'Done',
            'edit_request' => 'Edit Request',
            'sublet' => 'Sublet',
            'recall' => 'Recall',
        ];

        return $labels[$status] ?? 'Unknown Status';
    }
}

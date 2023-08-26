<?php

namespace App\Lib;

use App\Models\History;

class Helpers
{

    public function readableJSON($json_data)
    {
        dd($json_data);
    }

    public function historyChange($id)
    {
        $history = History::find($id);

        $previous = $history->previous;
        $after = $history->after;

        $previousData = json_decode($previous, true);
        $afterData = json_decode($after, true);

        $previous_changes = [];
        $after_changes = [];
        $changes = 0;
        
        // HANDLE CREATE AND DELETE
        foreach ($previousData as $key => $prevValue) {
            $afterValue = $afterData[$key];

            if ($prevValue !== $afterValue) {
                $changes = 1;
                $formattedKey = ucwords(str_replace('_', ' ', $key));

                if (strpos($formattedKey, "At") !== false) {
                    $prevValue = \Carbon\Carbon::parse($prevValue)->format('d-M-Y, h:i A');
                    $afterValue = \Carbon\Carbon::parse($afterValue)->format('d-M-Y, h:i A');
                }

                if ($prevValue !== $afterValue) {
                    $previous_changes[] = "<b>{$formattedKey}</b> => <small>{$prevValue}</small> <br>";
                    $after_changes[] = "<b>{$formattedKey}</b> => <small>{$afterValue}</small> <br>";
                }
            }
        }

        if($changes == 0)
        {
            $previous_changes[] = "No Changes";
            $after_changes[] = "No Changes";
        }

        $output["previous"] = implode("\n", $previous_changes) . "\n";
        $output["after"] = implode("\n", $after_changes) . "\n";

        return $output;
    }

}

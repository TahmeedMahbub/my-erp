<?php

namespace App\Lib;

use App\Models\Organization\AccessLevel;
use App\Models\Organization\History;
use App\Models\Contact\User;
use Illuminate\Support\Facades\Auth;

class Helpers
{

    public function readableJSON($json_data)
    {
        dd($json_data);
    }

    public function historyChange($id)
    {
        $history = History::find($id);

        if(empty($history->previous) && !empty($history->after))
        {

            $after = $history->after;

            $afterData = json_decode($after, true);

            $after_changes = [];
            $changes = 0;

            // HANDLE CREATE AND DELETE
            foreach ($afterData as $key => $afterValue) {
                if (!in_array($key, ['created_at', 'updated_at', 'created_by', 'updated_by', 'id', 'deletable', 'files', 'entries'])) {
                    $changes = 1;
                    $formattedKey = ucwords(str_replace('_', ' ', $key));

                    if (strpos($formattedKey, "At") !== false) {
                        $afterValue = \Carbon\Carbon::parse($afterValue)->format('d-M-Y, h:i A');
                    }

                    $after_changes[] = "<b>{$formattedKey}</b> ⇒ <small>{$afterValue}</small> <br>";
                }

                if(in_array($key, ['files']))
                {
                    $changes = 1;
                    $formattedKey = ucwords($key);

                    $afterValue = count(json_decode($afterValue)). " File(s)";

                    $after_changes[] = "<b>{$formattedKey}</b> ⇒ <small>{$afterValue}</small> <br>";
                }

                if(in_array($key, ['entries']))
                {

                    $changes = 1;
                    $formattedKey = ucwords($key);

                    $afterValue = count($afterValue). " Entry(s)";

                    $after_changes[] = "<b>{$formattedKey}</b> ⇒ <small>{$afterValue}</small> <br>";
                }
            }

            if($changes == 0)
            {
                $after_changes[] = '<p class="text-muted">Nothing to Show</p>';
            }

            $output["after"] = implode("\n", $after_changes) . "\n";

            return $output;
        }
        else if(!empty($history->previous) && !empty($history->after))
        {
            $previous = $history->previous;
            $after = $history->after;

            $previousData = json_decode($previous, true);
            $afterData = json_decode($after, true);

            $previous_changes = [];
            $after_changes = [];
            $changes = 0;

            // HANDLE CREATE AND DELETE
            foreach ($previousData as $key => $prevValue) {
                if (!in_array($key, ['created_at', 'updated_at', 'created_by', 'updated_by', 'id', 'deletable', 'files', 'entries'])) {
                    $afterValue = $afterData[$key];
                    if ($prevValue !== $afterValue) {
                        $changes = 1;
                        $formattedKey = ucwords(str_replace('_', ' ', $key));

                        // if (strpos($formattedKey, "At") !== false) {
                        //     $prevValue = \Carbon\Carbon::parse($prevValue)->format('d-M-Y, h:i A');
                        //     $afterValue = \Carbon\Carbon::parse($afterValue)->format('d-M-Y, h:i A');
                        // }

                        if ($prevValue !== $afterValue) {
                            $previous_changes[] = "<b>{$formattedKey}</b> ⇒ <small>{$prevValue}</small> <br>";
                            $after_changes[] = "<b>{$formattedKey}</b> ⇒ <small>{$afterValue}</small> <br>";
                        }
                    }
                }

                if(in_array($key, ['files']))
                {
                    $changes = 1;
                    $formattedKey = ucwords($key);
                    $afterValue = $afterData[$key];

                    if ($prevValue !== $afterValue) {
                        $previous_changes[] = "<b>{$formattedKey}</b> ⇒ <small>".count(json_decode($prevValue)). " File(s) </small> <br>";
                        $after_changes[] = "<b>{$formattedKey}</b> ⇒ <small>".count(json_decode($afterValue)). " File(s) </small> <br>";
                    }
                }

                if(in_array($key, ['entries']))
                {

                    $changes = 1;
                    $formattedKey = ucwords($key);
                    $afterValue = $afterData[$key];
                    // if(!empty($afterValue))
                    // {
                    //     dd($afterValue);
                    // }


                    if ($prevValue !== $afterValue) {
                        $previous_changes[] = "<b>{$formattedKey}</b> ⇒ <small>".count($prevValue). " Entry(s) </small> <br>";
                        $after_changes[] = "<b>{$formattedKey}</b> ⇒ <small>".count($afterValue). " Entry(s) </small> <br>";
                    }

                    // $afterValue = count(json_decode($afterValue)). " Entry(s)";

                    // if ($prevValue !== $afterValue) {
                    //     $previous_changes[] = "<b>{$formattedKey}</b> ⇒ <small>".count(json_decode($prevValue)). " File(s) </small> <br>";
                    //     $after_changes[] = "<b>{$formattedKey}</b> ⇒ <small>".count(json_decode($afterValue)). " File(s) </small> <br>";
                    // }
                }
            }

            if($changes == 0)
            {
                $previous_changes[] = '<p class="text-muted">Nothing to Show</p>';
                $after_changes[] = '<p class="text-muted">Nothing to Show</p>';
            }

            $output["previous"] = implode("\n", $previous_changes) . "\n";
            $output["after"] = implode("\n", $after_changes) . "\n";

            return $output;
        }
        else if(!empty($history->previous) && empty($history->after))
        {

            $previous = $history->previous;

            $previousData = json_decode($previous, true);

            $previous_changes = [];
            $changes = 0;

            // HANDLE CREATE AND DELETE
            foreach ($previousData as $key => $prevValue) {
                if (!in_array($key, ['created_at', 'updated_at', 'created_by', 'updated_by', 'id', 'deletable', 'files', 'entries'])) {
                    $changes = 1;
                    $formattedKey = ucwords(str_replace('_', ' ', $key));
                    if (strpos($formattedKey, "At") !== false) {
                        $prevValue = \Carbon\Carbon::parse($prevValue)->format('d-M-Y, h:i A');
                    }
                    $previous_changes[] = "<b>{$formattedKey}</b> ⇒ <small>{$prevValue}</small> <br>";
                }

                if(in_array($key, ['files']))
                {
                    $changes = 1;
                    $formattedKey = ucwords($key);

                    $prevValue = $prevValue ?? "[]" ;
                    $prevValue = gettype($prevValue) != "string" ? json_encode($prevValue) : $prevValue;
                    $prevValue = count(json_decode($prevValue)). " File(s)";

                    $previous_changes[] = "<b>{$formattedKey}</b> ⇒ <small>{$prevValue}</small> <br>";
                }

                if(in_array($key, ['entries']))
                {

                    $changes = 1;
                    $formattedKey = ucwords($key);

                    $prevValue = $prevValue ?? "[]" ;
                    $prevValue = gettype($prevValue) != "string" ? json_encode($prevValue) : $prevValue;
                    $prevValue = count(json_decode($prevValue)). " Entry(s)";

                    $previous_changes[] = "<b>{$formattedKey}</b> ⇒ <small>{$prevValue}</small> <br>";
                }
            }

            if($changes == 0)
            {
                $previous_changes[] = '<p class="text-muted">Nothing to Show</p>';
            }

            $output["previous"] = implode("\n", $previous_changes) . "\n";

            return $output;
        }
    }

    public function hasModuleAccess($prefixes){
        $has_access = false;
        $access_level = AccessLevel::with('module');
        $access = $access_level->where('user_id', Auth::User()->id)->whereHas('module', function($query) use ($prefixes){
            $query->whereIn('module_prefix', $prefixes);
        })
        ->where(function($query){
            $query->where('create', 1)
            ->orWhere('read', 1)
            ->orWhere('update', 1)
            ->orWhere('delete', 1);
        })
        ->count();

        $has_access = $access > 0 ? true : false;

        return $has_access;
    }

    public function codeGenerator($model, $prefix, $id)
    {
        $modelClassName = "\\App\\Models\\{$prefix}\\{$model}";
        $record = $modelClassName::find($id);

        $words = explode(' ', $record->name);

        $abbreviated = '';
        for ($i = 0; $i < min(2, count($words)); $i++) {
            $abbreviated .= strtoupper(substr($words[$i], 0, 1));
        }

        if(count($words) == 1)
        {
            $code = $abbreviated.str_pad($record->id, 5, 0,STR_PAD_LEFT);
        }
        else
        {
            $code = $abbreviated.str_pad($record->id, 4, 0,STR_PAD_LEFT);
        }
        $record = $modelClassName::where('code', $code)->first();

        return empty($record) ? $code : null;
    }

}

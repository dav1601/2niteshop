<?php

namespace App\Http\Traits;

trait Relationship
{

    function getRelationship($rela = "")
    {
        $relationship = config('Relationship.' . $rela);
        return $relationship;
    }
    function handle_rela($request, $rela, $relaId = 0, $resever = false, $isEdit = false)
    {
        $arrela = explode('-', $rela);
        if ($resever) {
            $arrela = array_reverse($arrela);
        }
        $key = $arrela[1];
        $name = $arrela[0];
        $qK = $key . "_id";
        $qN = $name . "_id";
        $rK = "rela__" . $key;
        $model = '\\App\Models\\';
        $relationship = $this->getRelationship($rela);
        if (!$relationship) {
            return;
        }
        $model .= $relationship['modelRela'];
        if (!$request->has($rK)) {
            return;
        }
        if ($request->get($rK)) {
            $selected = explode(",", $request->get($rK));
            try {
                if (count($selected) > 0) {
                    foreach ($selected as $id) {
                        if ($isEdit) {
                            $model::whereNotIn($qK,  $selected)->where($qN, $relaId)->delete();
                            $has = $model::where($qK,  $id)->where($qN, $relaId)->first();
                            if (!$has) {
                                $model::create([
                                    $qK => $id,
                                    $qN => $relaId
                                ]);
                            }
                        } else {
                            $model::create([
                                $qK => $id,
                                $qN => $relaId
                            ]);
                        }
                    }
                    unset($id);
                }
                return true;
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            if ($isEdit) {
                $model::where($qN, $relaId)->delete();
            }
        }

        return;
    }
}

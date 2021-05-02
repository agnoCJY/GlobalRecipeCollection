<?php

class RecipeController {

    public function get($f3) {
        header('Content-Type: application/json');
        $filter = '';
        $filter_array = array();
        $get_param = $f3->get('GET');
        foreach(array('country', 'meal_type', 'meal_time') as $query_key) {
            if (array_key_exists($query_key, $get_param) && $get_param[$query_key]) {
                if ($filter) {
                    $filter .= 'and '.$query_key.'=?';
                } else {
                    $filter .= $query_key.'=?';
                }
                array_push($filter_array, $get_param[$query_key]);
            }
        }
        if (array_key_exists('people_quantity_min', $get_param) && $get_param['people_quantity_min']) {
            if ($filter) {
                $filter .= 'and people_quantity>=?';
            } else {
                $filter .= 'people_quantity>=?';
            }
            array_push($filter_array, $get_param['people_quantity_min']);
        }
        if (array_key_exists('people_quantity_max', $get_param) && $get_param['people_quantity_max']) {
            if ($filter) {
                $filter .= 'and people_quantity<?';
            } else {
                $filter .= 'people_quantity<?';
            }
            array_push($filter_array, $get_param['people_quantity_max']);
        }
        array_unshift($filter_array, $filter);
        $recipe = new \DB\SQL\Mapper($f3->get('DB'), 'recipe');
        echo json_encode(array_map(
            function($mapper) { return $mapper->cast(); },
            $recipe->find($filter_array)
        ));
    }

    public function my_recipe($f3) {
        header('Content-Type: application/json');
        if (!$f3->exists('SESSION.userName') || $f3->get('SESSION.userName') == 'UNSET') {
            echo json_encode(array());
        } else {
            $filter = array('owner=?', $f3->get('SESSION.userName'));
            $recipe = new \DB\SQL\Mapper($f3->get('DB'), 'recipe');
            echo json_encode(array_map(
                function($mapper) { return $mapper->cast(); },
                $recipe->find($filter)
            ));
        }
    }

    public function post($f3) {
        $recipe = new \DB\SQL\Mapper($f3->get('DB'), 'recipe');
        $recipe.copyfrom('POST');
        $recipe.save();
        echo json_encode($recipe->cast());
    }

}

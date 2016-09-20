<?php
/**
 * Написать функцию которая из этого массива
 */
$data1 = [
    'parent.child.field' => 1,
    'parent.child.field2' => 2,
    'parent2.child.name' => 'test',
    'parent2.child2.name' => 'test',
    'parent2.child2.position' => 10,
    'parent3.child3.position' => 10,
];

//сделает такой и наоборот
$data = [
    'parent' => [
        'child' => [
            'field' => 1,
            'field2' => 2,
        ]
    ],
    'parent2' => [
        'child' => [
            'name' => 'test'
        ],
        'child2' => [
            'name' => 'test',
            'position' => 10
        ]
    ],
    'parent3' => [
        'child3' => [
            'position' => 10
        ]
    ],
];

function tree($arr){
    $data = array();

    foreach($arr as $curent_key => $v){
        $a = &$data;
        $keys = array_flip(explode(".",$curent_key));
        $a = &$keys;
        foreach($a as $key => $val){
            $a[$key] = array_splice($a,1,count($a));
            $a =&$a[$key];
        }
        $a = $v;
        $data = array_merge_recursive($data, $keys);
    }
    return $data;
}

function flat ($arr, &$result,$a = "")
{
    foreach ($arr as $key => $val)
    {
        if (is_array($arr[$key])){
            flat($arr[$key], $result,$a.".".$key);
        }
        else {
            $result[ltrim($a.".".$key,'.')] = $arr[$key];
        }
    }
    $a = "";
    return $a;
}
$data = tree($data1);
print_r($data);
flat($data,$data1);
print_r($data1);


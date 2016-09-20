<?php
/**
 * Нужно написать код, который из массива выведет то что приведено ниже в комментарии.
 */
$x = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];


//$x = array_flip($x);
$a = &$x;
$c = count($x);
for($i = 0;$i < $c;$i++ ){

    end($a);
    $k = $a[key($a)];

    $a[$k] = array_splice($a,0,count($a)-1);
    unset($a[0]);
    $a =&$a[$k];

}
unset($a);
print_r($x);

/*
print_r($x) - должен выводить это:
Array
(
    [h] => Array
        (
            [g] => Array
                (
                    [f] => Array
                        (
                            [e] => Array
                                (
                                    [d] => Array
                                        (
                                            [c] => Array
                                                (
                                                    [b] => Array
                                                        (
                                                            [a] =>
                                                        )

                                                )

                                        )

                                )

                        )

                )

        )

);*/

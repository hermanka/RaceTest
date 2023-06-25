
    #! /bin/bash
    echo "hello"
    i = 1
    for y in `seq 1 10`
    do (for x in `seq 1 10`
    do curl -s "http://localhost/racetest/pull.php?id=1&amount=100"
    done)&
    done